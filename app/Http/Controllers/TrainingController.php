<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Training;
use App\Models\Training_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
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
            $training = Training::where('name_article', 'LIKE', "%$keyword%")
                ->orWhere('type_article', 'LIKE', "%$keyword%")
                ->orWhere('start_date', 'LIKE', "%$keyword%")
                ->orWhere('end_date', 'LIKE', "%$keyword%")
                ->orWhere('start_time', 'LIKE', "%$keyword%")
                ->orWhere('end_time', 'LIKE', "%$keyword%")
                ->orWhere('check_all_day_start', 'LIKE', "%$keyword%")
                ->orWhere('check_all_day_end', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('link_video', 'LIKE', "%$keyword%")
                ->orWhere('link_lms', 'LIKE', "%$keyword%")
                ->orWhere('like', 'LIKE', "%$keyword%")
                ->orWhere('fav', 'LIKE', "%$keyword%")
                ->orWhere('share', 'LIKE', "%$keyword%")
                ->orWhere('user_view', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $training = Training::latest()->paginate($perPage);
        }

        return view('training.index', compact('training'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $type_article = Training_type::get();
        return view('training.create', compact('type_article'));
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
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        Training::create($requestData);

        // return redirect('training_create/article')->with('flash_message', 'Training added!');
        return redirect('/manage_training');
        
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
        $training = Training::findOrFail($id);

        return view('training.show', compact('training'));
    }

    public function share_training($id)
    {
        if(Auth::check()){
            return redirect('/training_show/'.$id);
        }
        else{
            $training = Training::findOrFail($id);

            return view('training.share_training', compact('training'));
        }
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
        $training = Training::findOrFail($id);

        return view('training.edit', compact('training'));
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
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        $training = Training::findOrFail($id);
        $training->update($requestData);

        return redirect('training')->with('flash_message', 'Training updated!');
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
        Training::destroy($id);

        return redirect('training')->with('flash_message', 'Training deleted!');
    }

    function sub_training($type){

        return view('training.sub_training', compact('type'));
    }

    function manage_training(){
        return view('training.manage_training');
    }

    function give_rating_training($user_id,$training_id,$selectedRating){

        $data_training = Training::where('id' , $training_id)->first();

        // User Like
        $new_user_like = array();
        if( !empty($data_training->user_like) ){
            $array = json_decode($data_training->user_like, true);
            if (!in_array($user_id, $array)) {
                // ถ้าไม่มี ให้เพิ่มค่า $user_id เข้าไป
                $array[] = $user_id;
            }
            $new_user_like = json_encode($array);
        }else{
            array_push($new_user_like, $user_id);
        }

        $data_training->user_like = $new_user_like ;
        $data_training->save();
        // END User Like

        // RATING
        if( empty($data_training->log_rating) ){

            $array_log[$user_id]['1']['status'] = 'Active';
            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['rating'] = $selectedRating;

        }else{

            $array_log = json_decode($data_training->log_rating, true);

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

        DB::table('trainings')
            ->where([ 
                    ['id', $training_id],
                ])
            ->update([
                    'log_rating' => $jsonLog,
                ]);

        $sum_rating = $this->sum_rating($training_id);
        // END RATING

        return $sum_rating;

    }

    function sum_rating($training_id){
        $data_training = Training::where('id' , $training_id)->first();
        $log_rating = $data_training->log_rating ;
        $user_like = $data_training->user_like ;

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

            $sum_rating = (int)$total_active_rating / (int)$count_array_user_like;

            DB::table('trainings')
            ->where([ 
                    ['id', $training_id],
                ])
            ->update([
                    'sum_rating' => $sum_rating,
                ]);

        }

        return $sum_rating ;

    }

    function user_cancel_like($user_id,$training_id){
        $data_training = Training::where('id' , $training_id)->first();
        $new_user_like = array();

        if( !empty($data_training->user_like) ){
            $array = json_decode($data_training->user_like, true);

            // เช็คว่าในอาร์เรย์มีค่า $user_id หรือไม่
            if (($key = array_search($user_id, $array)) !== false) {
                // ถ้ามี ให้ลบค่า $user_id ออกจากอาร์เรย์
                unset($array[$key]);
            }

            // จัดเรียงค่าดัชนีใหม่ของอาร์เรย์
            $array = array_values($array);

            $new_user_like = json_encode($array);

            $data_training->user_like = $new_user_like ;
            $data_training->save();

        }

        // RATING
        if( !empty($data_training->log_rating) ){

            $array_log = json_decode($data_training->log_rating, true);

            if (array_key_exists($user_id, $array_log)) {

                // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                foreach ($array_log[$user_id] as $round => $details) {
                    if (isset($details['status']) && $details['status'] === 'Active') {
                        $array_log[$user_id][$round]['status'] = 'Canceled';
                    }
                }
            }

            $jsonLog = json_encode($array_log);

            DB::table('trainings')
                ->where([ 
                        ['id', $training_id],
                    ])
                ->update([
                        'log_rating' => $jsonLog,
                    ]);

            }

            $sum_rating = $this->sum_rating($training_id);

        return $sum_rating;
    }

    function submit_reasons_dislike($user_id,$training_id,$reasons_dislike){

        $data_training = Training::where('id' , $training_id)->first();
        $array_log = array();

        if( empty($data_training->user_dislike) ){

            $array_log[$user_id]['1']['status'] = 'Active';
            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['reasons'] = $reasons_dislike;

        }else{

            $array_log = json_decode($data_training->user_dislike, true);

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

        DB::table('trainings')
            ->where([ 
                    ['id', $training_id],
                ])
            ->update([
                    'user_dislike' => $jsonLog,
                ]);
    }

    function user_cancel_dislike($user_id,$training_id){

        $data_training = Training::where('id' , $training_id)->first();
        $array_log = array();

        if( !empty($data_training->user_dislike) ){

            $array_log = json_decode($data_training->user_dislike, true);

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

        DB::table('trainings')
            ->where([ 
                    ['id', $training_id],
                ])
            ->update([
                    'user_dislike' => $jsonLog,
                ]);

    }

    function user_click_fav_btn($user_id,$training_id,$type){

        $data_training = Training::where('id' , $training_id)->first();
        $array_log = array();

        if($type == 'Yes'){

            if( empty($data_training->user_fav) ){

                $array_log[$user_id]['1']['status'] = 'Active';
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");

            }else{

                $array_log = json_decode($data_training->user_fav, true);

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

        }
        else if($type == 'No'){
            if( !empty($data_training->user_fav) ){

                $array_log = json_decode($data_training->user_fav, true);

                if (array_key_exists($user_id, $array_log)) {

                    // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                    foreach ($array_log[$user_id] as $round => $details) {
                        if (isset($details['status']) && $details['status'] === 'Active') {
                            $array_log[$user_id][$round]['status'] = 'Canceled';
                        }
                    }
                }

            }
        }

        $jsonLog = json_encode($array_log);

        DB::table('trainings')
            ->where([ 
                    ['id', $training_id],
                ])
            ->update([
                    'user_fav' => $jsonLog,
                ]);

        return 'success' ;

    }

    function update_user_view($user_id,$training_id){
        $data_training = Training::where('id' , $training_id)->first();
        $array_log = array();

        if( empty($data_training->user_view) ){

            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");

        }else{

            $array_log = json_decode($data_training->user_view, true);

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

        DB::table('trainings')
            ->where([ 
                    ['id', $training_id],
                ])
            ->update([
                    'user_view' => $jsonLog,
                ]);

        return 'success' ;
    }

    function update_countTime_trainingVideo($user_id,$countTime,$training_id){
        $data_training = Training::where('id' , $training_id)->first();
        $array_log = array();

        if( empty($data_training->log_video) ){

            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['countTime'] = $countTime;

        }else{

            $array_log = json_decode($data_training->log_video, true);

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

        DB::table('trainings')
            ->where([ 
                    ['id', $training_id],
                ])
            ->update([
                    'log_video' => $jsonLog,
                ]);

        return 'success' ;
    }

    function preview_training($id){

        $data_training = Training::where('id' , $id)->first();
        return view('training.preview_training', compact('data_training'));

    }

    function get_data_Training($type){

        $data = [];

        if($type == 'all'){
            // $data['data_training'] = Training::orderBy('id' , 'DESC')->get();

            $data['data_training'] = DB::table('trainings')
                ->join('training_types', 'training_types.id', '=', 'trainings.training_type_id')
                ->select('trainings.*', 'training_types.type_article')
                ->orderByRaw("CASE 
                        WHEN highlight_number IS NOT NULL THEN 1
                        ELSE 2
                        END, 
                        highlight_number ASC, 
                        id DESC")
                ->get();
        }
        else{
            $data['data_training'] = Training::where('training_type_id', $type)
                // ->orderBy('id' , 'DESC')
                ->orderByRaw("CASE 
                        WHEN highlight_of_type IS NOT NULL THEN 1
                        ELSE 2
                        END, 
                        highlight_of_type ASC, 
                        id DESC")
                ->get();
            $data_Training_type = Training_type::where('id', $type)->first();
            $data['type_article'] = $data_Training_type->type_article ;
        }

        return $data;
    }

    function get_data_Training_for_index($type){

        $data = [];

        if($type == 'all'){
            // $data['data_training'] = Training::orderBy('id' , 'DESC')->get();

            $data['data_training'] = DB::table('trainings')
                ->join('training_types', 'training_types.id', '=', 'trainings.training_type_id')
                ->select('trainings.*', 'training_types.type_article')
                ->where('trainings.status' , 'Yes')
                ->orderByRaw("CASE 
                        WHEN highlight_number IS NOT NULL THEN 1
                        ELSE 2
                        END, 
                        highlight_number ASC, 
                        id DESC")
                ->get();
        }
        else{
            $data['data_training'] = Training::where('training_type_id', $type)
                ->where('status' , 'Yes')
                // ->orderBy('id' , 'DESC')
                ->orderByRaw("CASE 
                        WHEN highlight_of_type IS NOT NULL THEN 1
                        ELSE 2
                        END, 
                        highlight_of_type ASC, 
                        id DESC")
                ->get();
            $data_Training_type = Training_type::where('id', $type)->first();
            $data['type_article'] = $data_Training_type->type_article ;
        }

        return $data;
    }

    function change_Highlight($training_id , $number , $type){

        $data = [];

        if($type == 'all'){
            $Highlight_number_old = Training::where('highlight_number', $number)->first();
            $Highlight_number_select = Training::where('id', $training_id)->first();

            if( !empty($Highlight_number_select->highlight_number) ){
                $data['old_id_change_to'] = $Highlight_number_select->highlight_number;
            }
            else{
                $data['old_id_change_to'] = null;
            }

            if( !empty($Highlight_number_old->id) ){
                $data['old_id'] = $Highlight_number_old->id;

                DB::table('trainings')
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

            DB::table('trainings')
                ->where([ 
                        ['id', $training_id],
                    ])
                ->update([
                        'highlight_number' => $number,
                    ]);
        }
        else{
            $Highlight_number_old = Training::where('training_type_id' , $type)->where('highlight_of_type', $number)->first();
            $Highlight_number_select = Training::where('id', $training_id)->first();

            if( !empty($Highlight_number_select->highlight_of_type) ){
                $data['old_id_change_to'] = $Highlight_number_select->highlight_of_type;
            }
            else{
                $data['old_id_change_to'] = null;
            }

            if( !empty($Highlight_number_old->id) ){
                $data['old_id'] = $Highlight_number_old->id;

                DB::table('trainings')
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

            DB::table('trainings')
                ->where([ 
                        ['id', $training_id],
                    ])
                ->update([
                        'highlight_of_type' => $number,
                    ]);
        }

        return $data;

    }
}
