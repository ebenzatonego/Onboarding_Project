<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Activity_type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class ActivitysController extends Controller
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
            $activitys = Activity::where('title', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('activity_type_id', 'LIKE', "%$keyword%")
                ->orWhere('all_day', 'LIKE', "%$keyword%")
                ->orWhere('date_start', 'LIKE', "%$keyword%")
                ->orWhere('date_end', 'LIKE', "%$keyword%")
                ->orWhere('time_start', 'LIKE', "%$keyword%")
                ->orWhere('time_end', 'LIKE', "%$keyword%")
                ->orWhere('location_detail', 'LIKE', "%$keyword%")
                ->orWhere('link_map', 'LIKE', "%$keyword%")
                ->orWhere('user_like', 'LIKE', "%$keyword%")
                ->orWhere('user_dislike', 'LIKE', "%$keyword%")
                ->orWhere('user_share', 'LIKE', "%$keyword%")
                ->orWhere('user_fav', 'LIKE', "%$keyword%")
                ->orWhere('user_view', 'LIKE', "%$keyword%")
                ->orWhere('sum_rating', 'LIKE', "%$keyword%")
                ->orWhere('log_rating', 'LIKE', "%$keyword%")
                ->orWhere('highlight_number', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $activitys = Activity::latest()->paginate($perPage);
        }

        return view('activitys.index', compact('activitys'));
    }

    public function share_activity($id)
    {
        if(Auth::check()){
            return redirect('/activitys_show/'.$id);
        }
        else{
            $activity = Activity::findOrFail($id);

            return view('activitys.share_activity', compact('activity'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $data_activity_type = Activity_type::orderBy('name_type' , 'ASC')->get();
        return view('activitys.create', compact('data_activity_type'));
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

        if( !empty($requestData['activity_type_id']) ){
            $check_activity_type = Activity_type::where('name_type' , $requestData['activity_type_id'])->first();

            if( empty($check_activity_type->id) ){

                $data_create = [];
                $data_create['name_type'] = $requestData['activity_type_id'];
                $new_data_type = Activity_type::create($data_create);

                $requestData['activity_type_id'] = $new_data_type->id ;
            }
            else{
                $requestData['activity_type_id'] = $check_activity_type->id ;
            }
        }
        
        Activity::create($requestData);

        return redirect('activitys')->with('flash_message', 'Activity added!');
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
        $activity = Activity::findOrFail($id);

        return view('activitys.show', compact('activity'));
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
        $activity = Activity::findOrFail($id);

        return view('activitys.edit', compact('activity'));
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
        
        $activity = Activity::findOrFail($id);
        $activity->update($requestData);

        return redirect('activitys')->with('flash_message', 'Activity updated!');
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
        Activity::destroy($id);

        return redirect('activitys')->with('flash_message', 'Activity deleted!');
    }

    function update_user_view_activity($user_id,$activity_id){
        $data_activity = Activity::where('id' , $activity_id)->first();
        $array_log = array();

        if( empty($data_activity->user_view) ){

            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");

        }else{

            $array_log = json_decode($data_activity->user_view, true);

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

        DB::table('activitys')
            ->where([ 
                    ['id', $activity_id],
                ])
            ->update([
                    'user_view' => $jsonLog,
                ]);

        return 'success' ;
    }

    function get_data_activitys($activity_type_id){

        if($activity_type_id == 'all'){
            $data_activity = Activity::orderByRaw("CASE 
                            WHEN highlight_number IS NOT NULL THEN 1
                            ELSE 2
                            END, 
                            highlight_number ASC, 
                            id DESC")
                        ->get();

        }
        else{
            $data_activity = Activity::orderByRaw("CASE 
                            WHEN highlight_of_type IS NOT NULL THEN 1
                            ELSE 2
                            END, 
                            highlight_of_type ASC, 
                            id DESC")
                        ->where('activity_type_id' , $activity_type_id)
                        ->get();
        }

        return $data_activity ;

    }

    function give_rating_activity($user_id,$activity_id,$selectedRating){

        $data_activity = activity::where('id' , $activity_id)->first();

        // User Like
        $new_user_like = array();
        if( !empty($data_activity->user_like) ){
            $array = json_decode($data_activity->user_like, true);
            if (!in_array($user_id, $array)) {
                // ถ้าไม่มี ให้เพิ่มค่า $user_id เข้าไป
                $array[] = $user_id;
            }
            $new_user_like = json_encode($array);
        }else{
            array_push($new_user_like, $user_id);
        }

        $data_activity->user_like = $new_user_like ;
        $data_activity->save();
        // END User Like

        // RATING
        if( empty($data_activity->log_rating) ){

            $array_log[$user_id]['1']['status'] = 'Active';
            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['rating'] = $selectedRating;

        }else{

            $array_log = json_decode($data_activity->log_rating, true);

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

        DB::table('activitys')
            ->where([ 
                    ['id', $activity_id],
                ])
            ->update([
                    'log_rating' => $jsonLog,
                ]);

        $sum_rating = $this->sum_rating($activity_id);
        // END RATING

        return $sum_rating;

    }

    function sum_rating($activity_id){
        $data_activity = Activity::where('id' , $activity_id)->first();
        $log_rating = $data_activity->log_rating ;
        $user_like = $data_activity->user_like ;

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

            DB::table('activitys')
            ->where([ 
                    ['id', $activity_id],
                ])
            ->update([
                    'sum_rating' => $sum_rating,
                ]);

        }

        return $sum_rating ;

    }

    function user_cancel_like_activity($user_id,$activity_id){
        $data_activity = Activity::where('id' , $activity_id)->first();
        $new_user_like = array();

        if( !empty($data_activity->user_like) ){
            $array = json_decode($data_activity->user_like, true);

            // เช็คว่าในอาร์เรย์มีค่า $user_id หรือไม่
            if (($key = array_search($user_id, $array)) !== false) {
                // ถ้ามี ให้ลบค่า $user_id ออกจากอาร์เรย์
                unset($array[$key]);
            }

            // จัดเรียงค่าดัชนีใหม่ของอาร์เรย์
            $array = array_values($array);

            $new_user_like = json_encode($array);

            $data_activity->user_like = $new_user_like ;
            $data_activity->save();

        }

        // RATING
        if( !empty($data_activity->log_rating) ){

            $array_log = json_decode($data_activity->log_rating, true);

            if (array_key_exists($user_id, $array_log)) {

                // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                foreach ($array_log[$user_id] as $round => $details) {
                    if (isset($details['status']) && $details['status'] === 'Active') {
                        $array_log[$user_id][$round]['status'] = 'Canceled';
                    }
                }
            }

            $jsonLog = json_encode($array_log);

            DB::table('activitys')
                ->where([ 
                        ['id', $activity_id],
                    ])
                ->update([
                        'log_rating' => $jsonLog,
                    ]);

            }

            $sum_rating = $this->sum_rating($activity_id);

        return $sum_rating;

    }

    function submit_reasons_dislike_activity($user_id,$activity_id,$reasons_dislike){

        $data_activity = Activity::where('id' , $activity_id)->first();
        $array_log = array();

        if( empty($data_activity->user_dislike) ){

            $array_log[$user_id]['1']['status'] = 'Active';
            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['reasons'] = $reasons_dislike;

        }else{

            $array_log = json_decode($data_activity->user_dislike, true);

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

        DB::table('activitys')
            ->where([ 
                    ['id', $activity_id],
                ])
            ->update([
                    'user_dislike' => $jsonLog,
                ]);

    }

    function user_cancel_dislike_activity($user_id,$activity_id){

        $data_activity = Activity::where('id' , $activity_id)->first();
        $array_log = array();

        if( !empty($data_activity->user_dislike) ){

            $array_log = json_decode($data_activity->user_dislike, true);

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

        DB::table('activitys')
            ->where([ 
                    ['id', $activity_id],
                ])
            ->update([
                    'user_dislike' => $jsonLog,
                ]);


    }

    function user_click_fav_btn_activity($user_id,$activity_id,$type){

        $data_activity = Activity::where('id' , $activity_id)->first();
        $array_log = array();

        $data_for_table_fav = [];

        if($type == 'Yes'){

            if( empty($data_activity->user_fav) ){

                $array_log[$user_id]['1']['status'] = 'Active';
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");

            }else{

                $array_log = json_decode($data_activity->user_fav, true);

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
            $check_table_fav = Favorite::where('type','กิจกรรม')
                ->where('activity_id',$activity_id)
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
                $data_for_table_fav['type'] = 'กิจกรรม';
                $data_for_table_fav['user_id'] = $user_id;
                $data_for_table_fav['status'] = 'Yes';
                $data_for_table_fav['activity_id'] = $activity_id;

                Favorite::create($data_for_table_fav);
            }
            // END เพิ่มข้อมูลในตาราง FAV


        }
        else if($type == 'No'){
            if( !empty($data_activity->user_fav) ){

                $array_log = json_decode($data_activity->user_fav, true);

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
            $check_table_fav = Favorite::where('type','กิจกรรม')
                ->where('activity_id',$activity_id)
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

        DB::table('activitys')
            ->where([ 
                    ['id', $activity_id],
                ])
            ->update([
                    'user_fav' => $jsonLog,
                ]);

        return 'success' ;

    }

}
