<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\News_type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Log_delete_content;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $news = News::where('title', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('photo_content', 'LIKE', "%$keyword%")
                ->orWhere('photo_cover', 'LIKE', "%$keyword%")
                ->orWhere('link', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('link_content', 'LIKE', "%$keyword%")
                ->orWhere('title_link_content', 'LIKE', "%$keyword%")
                ->orWhere('user_like', 'LIKE', "%$keyword%")
                ->orWhere('user_dislike', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $news = News::latest()->paginate($perPage);
        }

        return view('news.index', compact('news'));
    }

    public function share_news($id)
    {
        if(Auth::check()){
            return redirect('/news_show/'.$id);
        }
        else{
            $news = News::findOrFail($id);

            return view('news.share_news', compact('news'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $news_type = News_type::get();
        return view('news.create', compact('news_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();

        if( !empty($requestData['news_type_id']) ){
            $check_news_type = News_type::where('name_type' , $requestData['news_type_id'])->first();

            if( empty($check_news_type->id) ){

                $data_create = [];
                $data_create['name_type'] = $requestData['news_type_id'];
                $new_data_type = News_type::create($data_create);

                $requestData['news_type_id'] = $new_data_type->id ;
            }
            else{
                $requestData['news_type_id'] = $check_news_type->id ;
            }
        }
        
        News::create($requestData);

        // return redirect('news')->with('flash_message', 'News added!');
        return redirect('/manage_news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $news = News::findOrFail($id);

        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $news = News::findOrFail($id);
        $news->update($requestData);

        return redirect('news')->with('flash_message', 'News updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $news = News::where('id',$id)->first();
        $user_id = Auth::user()->id ;

        $data = [];
        $data['type'] = 'ข่าว';
        $data['user_id'] = $user_id;
        $data['news_name'] = $news->title;

        Log_delete_content::create($data);
        News::destroy($id);

        return redirect('manage_news')->with('flash_message', 'News deleted!');
    }

    function manage_news(){
        return view('news.manage_news');
    }

    function get_data_news($news_type_id){

        if($news_type_id == 'all'){
            $data_news = DB::table('news')
                ->join('news_types', 'news_types.id', '=', 'news.news_type_id')
                ->where('news.status' , 'Yes')
                ->select('news.*', 'news_types.name_type')
                ->orderByRaw("CASE 
                            WHEN news.highlight_number IS NOT NULL THEN 1
                            ELSE 2
                            END, 
                            news.highlight_number ASC, 
                            id DESC")
                ->get();

        }
        else{
            
            $data_news = DB::table('news')
                ->join('news_types', 'news_types.id', '=', 'news.news_type_id')
                ->where('news.status' , 'Yes')
                ->where('news.news_type_id' , $news_type_id)
                ->select('news.*', 'news_types.name_type')
                ->orderByRaw("CASE 
                            WHEN news.highlight_of_type IS NOT NULL THEN 1
                            ELSE 2
                            END, 
                            news.highlight_of_type ASC, 
                            id DESC")
                ->get();
        }

        return $data_news ;

    }

    function update_user_view_news($user_id,$news_type_id){
        $data_news = News::where('id' , $news_type_id)->first();
        $array_log = array();

        if( empty($data_news->user_view) ){

            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");

        }else{

            $array_log = json_decode($data_news->user_view, true);

            if (array_key_exists($user_id, $array_log)) {

                // หากเท่ากันให้เพิ่ม key round และ time ใน key นั้น
                $count_round_old = count($array_log[$user_id]);
                $new_round = intval($count_round_old) + 1 ;

                $array_log[$user_id][$new_round]['datetime'] = date("d/m/Y H:i");
            } else {
                // หากไม่เท่ากันให้เพิ่ม key ใหม่โดยใช้ $user_id
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            }

        }

        $jsonLog = json_encode($array_log);

        DB::table('news')
            ->where([ 
                    ['id', $news_type_id],
                ])
            ->update([
                    'user_view' => $jsonLog,
                ]);

        return 'success' ;
    }

    function give_rating_news($user_id,$news_id,$selectedRating){

        $data_news = News::where('id' , $news_id)->first();

        // User Like
        $new_user_like = array();
        if( !empty($data_news->user_like) ){
            $array = json_decode($data_news->user_like, true);
            if (!in_array($user_id, $array)) {
                // ถ้าไม่มี ให้เพิ่มค่า $user_id เข้าไป
                $array[] = $user_id;
            }
            $new_user_like = json_encode($array);
        }else{
            array_push($new_user_like, $user_id);
        }

        $data_news->user_like = $new_user_like ;
        $data_news->save();
        // END User Like

        // RATING
        if( empty($data_news->log_rating) ){

            $array_log[$user_id]['1']['status'] = 'Active';
            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['rating'] = $selectedRating;

        }else{

            $array_log = json_decode($data_news->log_rating, true);

            if (array_key_exists($user_id, $array_log)) {

                // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                foreach ($array_log[$user_id] as $round => $details) {
                    if (isset($details['status']) && $details['status'] === 'Active') {
                        $array_log[$user_id][$round]['status'] = 'Canceled';
                    }
                }

                // หากเท่ากันให้เพิ่ม key round และ time ใน key นั้น
                $count_round_old = count($array_log[$user_id]);
                $new_round = intval($count_round_old) + 1 ;

                $array_log[$user_id][$new_round]['status'] = 'Active';
                $array_log[$user_id][$new_round]['datetime'] = date("d/m/Y H:i");
                $array_log[$user_id][$new_round]['rating'] = $selectedRating;
            } else {
                // หากไม่เท่ากันให้เพิ่ม key ใหม่โดยใช้ $user_id
                $array_log[$user_id]['1']['status'] = 'Active';
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
                $array_log[$user_id]['1']['rating'] = $selectedRating;
            }

        }

        $jsonLog = json_encode($array_log);

        DB::table('news')
            ->where([ 
                    ['id', $news_id],
                ])
            ->update([
                    'log_rating' => $jsonLog,
                ]);

        $sum_rating = $this->sum_rating($news_id);
        // END RATING

        return $sum_rating;

    }

    function sum_rating($news_id){
        $data_news = News::where('id' , $news_id)->first();
        $log_rating = $data_news->log_rating ;
        $user_like = $data_news->user_like ;

        $count_array_user_like = 0 ;
        if( !empty($user_like) ){
            $array_user_like = json_decode($user_like, true);
            $count_array_user_like = count($array_user_like);
        }

        if( !empty($log_rating) ){
            $array_log = json_decode($log_rating, true);

            $total_active_rating = 0;

            // วนลูปผ่านอาร์เรย์เพื่อค้นหาและบวกรวมค่า rating ที่มี status เป็น 'Active'
            foreach ($array_log as $user_id => $rounds) {
                foreach ($rounds as $round => $details) {
                    if (isset($details['status']) && $details['status'] === 'Active') {
                        $total_active_rating += (int)$details['rating'];
                    }
                }
            }

            if($count_array_user_like == 0){
                $sum_rating = 0 ;
            }
            else{
                $sum_rating = (int)$total_active_rating / (int)$count_array_user_like;
            }

            DB::table('news')
            ->where([ 
                    ['id', $news_id],
                ])
            ->update([
                    'sum_rating' => $sum_rating,
                ]);

        }

        return $sum_rating ;

    }

    function user_cancel_like_news($user_id,$news_id){
        $data_news = News::where('id' , $news_id)->first();
        $new_user_like = array();

        if( !empty($data_news->user_like) ){
            $array = json_decode($data_news->user_like, true);

            // เช็คว่าในอาร์เรย์มีค่า $user_id หรือไม่
            if (($key = array_search($user_id, $array)) !== false) {
                // ถ้ามี ให้ลบค่า $user_id ออกจากอาร์เรย์
                unset($array[$key]);
            }

            // จัดเรียงค่าดัชนีใหม่ของอาร์เรย์
            $array = array_values($array);

            $new_user_like = json_encode($array);

            $data_news->user_like = $new_user_like ;
            $data_news->save();

        }

        // RATING
        if( !empty($data_news->log_rating) ){

            $array_log = json_decode($data_news->log_rating, true);

            if (array_key_exists($user_id, $array_log)) {

                // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                foreach ($array_log[$user_id] as $round => $details) {
                    if (isset($details['status']) && $details['status'] === 'Active') {
                        $array_log[$user_id][$round]['status'] = 'Canceled';
                    }
                }
            }

            $jsonLog = json_encode($array_log);

            DB::table('news')
                ->where([ 
                        ['id', $news_id],
                    ])
                ->update([
                        'log_rating' => $jsonLog,
                    ]);

            }

            $sum_rating = $this->sum_rating($news_id);

        return $sum_rating;

    }

    function user_cancel_dislike_news($user_id,$news_id){

        $data_news = News::where('id' , $news_id)->first();
        $array_log = array();

        if( !empty($data_news->user_dislike) ){

            $array_log = json_decode($data_news->user_dislike, true);

            if (array_key_exists($user_id, $array_log)) {

                // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                foreach ($array_log[$user_id] as $round => $details) {
                    if (isset($details['status']) && $details['status'] === 'Active') {
                        $array_log[$user_id][$round]['status'] = 'Canceled';
                    }
                }
            } 

        }

        $jsonLog = json_encode($array_log);

        DB::table('news')
            ->where([ 
                    ['id', $news_id],
                ])
            ->update([
                    'user_dislike' => $jsonLog,
                ]);
    }

    function submit_reasons_dislike_news($user_id,$news_id,$reasons_dislike){

        $data_news = News::where('id' , $news_id)->first();
        $array_log = array();

        if( empty($data_news->user_dislike) ){

            $array_log[$user_id]['1']['status'] = 'Active';
            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['reasons'] = $reasons_dislike;

        }else{

            $array_log = json_decode($data_news->user_dislike, true);

            if (array_key_exists($user_id, $array_log)) {

                // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                foreach ($array_log[$user_id] as $round => $details) {
                    if (isset($details['status']) && $details['status'] === 'Active') {
                        $array_log[$user_id][$round]['status'] = 'Canceled';
                    }
                }

                // หากเท่ากันให้เพิ่ม key round และ time ใน key นั้น
                $count_round_old = count($array_log[$user_id]);
                $new_round = intval($count_round_old) + 1 ;

                $array_log[$user_id][$new_round]['status'] = 'Active';
                $array_log[$user_id][$new_round]['datetime'] = date("d/m/Y H:i");
                $array_log[$user_id][$new_round]['reasons'] = $reasons_dislike;
            } else {
                // หากไม่เท่ากันให้เพิ่ม key ใหม่โดยใช้ $user_id
                $array_log[$user_id]['1']['status'] = 'Active';
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
                $array_log[$user_id]['1']['reasons'] = $reasons_dislike;
            }

        }

        $jsonLog = json_encode($array_log);

        DB::table('news')
            ->where([ 
                    ['id', $news_id],
                ])
            ->update([
                    'user_dislike' => $jsonLog,
                ]);

    }

    function user_click_fav_btn_news($user_id,$news_id,$type){

        $data_news = News::where('id' , $news_id)->first();
        $array_log = array();

        $data_for_table_fav = [];

        if($type == 'Yes'){

            if( empty($data_news->user_fav) ){

                $array_log[$user_id]['1']['status'] = 'Active';
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");

            }else{

                $array_log = json_decode($data_news->user_fav, true);

                if (array_key_exists($user_id, $array_log)) {

                    // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                    foreach ($array_log[$user_id] as $round => $details) {
                        if (isset($details['status']) && $details['status'] === 'Active') {
                            $array_log[$user_id][$round]['status'] = 'Canceled';
                        }
                    }

                    // หากเท่ากันให้เพิ่ม key round และ time ใน key นั้น
                    $count_round_old = count($array_log[$user_id]);
                    $new_round = intval($count_round_old) + 1 ;

                    $array_log[$user_id][$new_round]['status'] = 'Active';
                    $array_log[$user_id][$new_round]['datetime'] = date("d/m/Y H:i");
                } else {
                    // หากไม่เท่ากันให้เพิ่ม key ใหม่โดยใช้ $user_id
                    $array_log[$user_id]['1']['status'] = 'Active';
                    $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
                }

            }

            // เพิ่มข้อมูลในตาราง FAV
            $check_table_fav = Favorite::where('type','ข่าว')
                ->where('news_id',$news_id)
                ->where('user_id',$user_id)
                ->first();

            if( !empty($check_table_fav->id) ){
                if($check_table_fav->status != 'Yes'){
                    DB::table('favorites')
                        ->where([ 
                                ['id', $check_table_fav->id],
                            ])
                        ->update([
                                'status' => 'Yes',
                            ]);
                }
            }
            else{
                $data_for_table_fav['type'] = 'ข่าว';
                $data_for_table_fav['user_id'] = $user_id;
                $data_for_table_fav['status'] = 'Yes';
                $data_for_table_fav['news_id'] = $news_id;

                Favorite::create($data_for_table_fav);
            }
            // END เพิ่มข้อมูลในตาราง FAV


        }
        else if($type == 'No'){
            if( !empty($data_news->user_fav) ){

                $array_log = json_decode($data_news->user_fav, true);

                if (array_key_exists($user_id, $array_log)) {

                    // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                    foreach ($array_log[$user_id] as $round => $details) {
                        if (isset($details['status']) && $details['status'] === 'Active') {
                            $array_log[$user_id][$round]['status'] = 'Canceled';
                        }
                    }
                }

            }

            // เพิ่มข้อมูลในตาราง FAV
            $check_table_fav = Favorite::where('type','ข่าว')
                ->where('news_id',$news_id)
                ->where('user_id',$user_id)
                ->first();

            if( !empty($check_table_fav->id) ){
                if($check_table_fav->status == 'Yes'){
                    DB::table('favorites')
                        ->where([ 
                                ['id', $check_table_fav->id],
                            ])
                        ->update([
                                'status' => null,
                            ]);
                }
            }
            // END เพิ่มข้อมูลในตาราง FAV
        }

        $jsonLog = json_encode($array_log);

        DB::table('news')
            ->where([ 
                    ['id', $news_id],
                ])
            ->update([
                    'user_fav' => $jsonLog,
                ]);

        return 'success' ;

    }

    function update_countTime_newsVideo($user_id,$countTime,$news_id){
        $data_news = News::where('id' , $news_id)->first();
        $array_log = array();

        if( empty($data_news->log_video) ){

            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['countTime'] = $countTime;

        }else{

            $array_log = json_decode($data_news->log_video, true);

            if (array_key_exists($user_id, $array_log)) {

                // หากเท่ากันให้เพิ่ม key round และ time ใน key นั้น
                $count_round_old = count($array_log[$user_id]);
                $new_round = intval($count_round_old) + 1 ;

                $array_log[$user_id][$new_round]['datetime'] = date("d/m/Y H:i");
                $array_log[$user_id][$new_round]['countTime'] = $countTime;
            } else {
                // หากไม่เท่ากันให้เพิ่ม key ใหม่โดยใช้ $user_id
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
                $array_log[$user_id]['1']['countTime'] = $countTime;
            }

        }

        $jsonLog = json_encode($array_log);

        DB::table('news')
            ->where([ 
                    ['id', $news_id],
                ])
            ->update([
                    'log_video' => $jsonLog,
                ]);

        return 'success' ;
    }

    function get_data_news_admin($type){

        $data = [];

        if($type == 'all'){

            // $data['data_news'] = DB::table('news')
            //     ->join('news_types', 'news_types.id', '=', 'news.news_type_id')
            //     ->select('news.*', 'news_types.name_type')
            //     ->orderBy("id", "DESC")
            //     ->get();

            $data['data_news'] = DB::table('news')
                ->join('news_types', 'news_types.id', '=', 'news.news_type_id')
                ->leftJoin('users', 'users.id', '=', 'news.creator')
                ->select('news.*', 'news_types.name_type' , 'users.name as name_creator')
                ->orderByRaw("CASE 
                        WHEN highlight_number IS NOT NULL THEN 1
                        ELSE 2
                        END, 
                        highlight_number ASC, 
                        id DESC")
                ->get();
        }
        else{
            // $data['data_news'] = News::where('news_type_id', $type)
            //     ->orderBy("id", "DESC")
            //     ->get();

            $data['data_news'] = DB::table('news')
                ->join('news_types', 'news_types.id', '=', 'news.news_type_id')
                ->leftJoin('users', 'users.id', '=', 'news.creator')
                ->select('news.*', 'news_types.name_type' , 'users.name as name_creator')
                ->where('news.news_type_id', $type)
                ->orderByRaw("CASE 
                        WHEN highlight_of_type IS NOT NULL THEN 1
                        ELSE 2
                        END, 
                        highlight_of_type ASC, 
                        id DESC")
                ->get();

            $data_New_type = News_type::where('id', $type)->first();
            $data['name_type'] = $data_New_type->name_type ;
        }

        return $data;
    }

    function change_Highlight_news($news_id , $number , $type){

        $data = [];

        if($type == 'all'){
            $Highlight_number_old = News::where('highlight_number', $number)->first();
            $Highlight_number_select = News::where('id', $news_id)->first();

            if( !empty($Highlight_number_select->highlight_number) ){
                $data['old_id_change_to'] = $Highlight_number_select->highlight_number;
            }
            else{
                $data['old_id_change_to'] = null;
            }

            if( !empty($Highlight_number_old->id) ){
                $data['old_id'] = $Highlight_number_old->id;

                DB::table('news')
                    ->where([ 
                            ['id', $data['old_id']],
                        ])
                    ->update([
                            'highlight_number' => $data['old_id_change_to'],
                        ]);
            }

            if($number == 'ว่าง'){
                $number = null ;
            }

            DB::table('news')
                ->where([ 
                        ['id', $news_id],
                    ])
                ->update([
                        'highlight_number' => $number,
                    ]);
        }
        else{
            $Highlight_number_old = News::where('news_type_id' , $type)->where('highlight_of_type', $number)->first();
            $Highlight_number_select = News::where('id', $news_id)->first();

            if( !empty($Highlight_number_select->highlight_of_type) ){
                $data['old_id_change_to'] = $Highlight_number_select->highlight_of_type;
            }
            else{
                $data['old_id_change_to'] = null;
            }

            if( !empty($Highlight_number_old->id) ){
                $data['old_id'] = $Highlight_number_old->id;

                DB::table('news')
                    ->where([ 
                            ['id', $data['old_id']],
                        ])
                    ->update([
                            'highlight_of_type' => $data['old_id_change_to'],
                        ]);
            }

            if($number == 'ว่าง'){
                $number = null ;
            }

            DB::table('news')
                ->where([ 
                        ['id', $news_id],
                    ])
                ->update([
                        'highlight_of_type' => $number,
                    ]);
        }

        return $data;

    }

}
