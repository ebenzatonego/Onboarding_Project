<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Training_type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Training;
use App\Models\Appointment_area;
use App\Models\Favorite;
use App\Models\Log_delete_content;

class AppointmentsController extends Controller
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
            $appointments = Appointment::where('title', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('training_type_id', 'LIKE', "%$keyword%")
                ->orWhere('all_day', 'LIKE', "%$keyword%")
                ->orWhere('date_start', 'LIKE', "%$keyword%")
                ->orWhere('date_end', 'LIKE', "%$keyword%")
                ->orWhere('time_start', 'LIKE', "%$keyword%")
                ->orWhere('time_end', 'LIKE', "%$keyword%")
                ->orWhere('user_like', 'LIKE', "%$keyword%")
                ->orWhere('user_dislike', 'LIKE', "%$keyword%")
                ->orWhere('user_share', 'LIKE', "%$keyword%")
                ->orWhere('user_fav', 'LIKE', "%$keyword%")
                ->orWhere('location_detail', 'LIKE', "%$keyword%")
                ->orWhere('link_map', 'LIKE', "%$keyword%")
                ->orWhere('link_out', 'LIKE', "%$keyword%")
                ->orWhere('click_link_out', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $appointments = Appointment::latest()->paginate($perPage);
        }

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($type)
    {
        if($type == 'quiz'){
            $type = 'สอบ';
        }
        else{
            $type = 'อบรม';
        }

        $type_article = Training_type::get();
        $appointment_area = Appointment_area::orderBy('area','ASC')->get();
        return view('appointments.create', compact('type_article','appointment_area','type'));
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
        
        Appointment::create($requestData);

        return redirect('/manage_appointment/quiz');
        // return redirect('appointments')->with('flash_message', 'Appointment added!');
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
        $appointment = Appointment::findOrFail($id);

        return view('appointments.show', compact('appointment'));
    }

    public function share_appointment($id)
    {
        if(Auth::check()){
            return redirect('/show_appointment_train/'.$id);
        }
        else{
            $appointment = Appointment::findOrFail($id);

            return view('appointments.share_appointment', compact('appointment'));
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
        $appointment = Appointment::findOrFail($id);

        return view('appointments.edit', compact('appointment'));
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
        
        $appointment = Appointment::findOrFail($id);
        $appointment->update($requestData);

        if($requestData['type'] == 'อบรม'){
           return redirect('/manage_appointment/train'); 
        }
        else{
           return redirect('/manage_appointment/quiz'); 
        }

        // return redirect('appointments')->with('flash_message', 'Appointment updated!');
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
        $appointment = Appointment::where('id',$id)->first();
        $user_id = Auth::user()->id ;

        $data = [];
        $data['type'] = 'อบรม/สอบ';
        $data['user_id'] = $user_id;
        $data['appointment_name'] = $appointment->title;

        Log_delete_content::create($data);
        Appointment::destroy($id);

        return redirect('/manage_appointment/quiz')->with('flash_message', 'Appointment deleted!');
    }

    function manage_appointment($type){

        if($type == 'quiz'){
            $type = 'สอบ';
        }
        else{
            $type = 'อบรม';
        }

        $data_Training_type = Training_type::orderByRaw("CASE 
                        WHEN check_highlight IS NOT NULL THEN 1
                        ELSE 2
                        END, 
                        check_highlight ASC, 
                        id ASC")
                    ->get();

        $photo_menu_highlight_1 = Training_type::where('check_highlight' , '1')
            ->select('photo_menu')
            ->first();

        $photo_menu_highlight_2 = Training_type::where('check_highlight' , '2')
            ->select('photo_menu')
            ->first();

        $photo_menu_highlight_3 = Training_type::where('check_highlight' , '3')
            ->select('photo_menu')
            ->first();

        $photo_menu_highlight_4 = Training_type::where('check_highlight' , '4')
            ->select('photo_menu')
            ->first();

        return view('appointments.manage_appointment', compact('data_Training_type','photo_menu_highlight_1','photo_menu_highlight_2','photo_menu_highlight_3','photo_menu_highlight_4', 'type'));
    }

    function show_appointment_train($id){
        $appointment = Appointment::findOrFail($id);
        return view('appointments.show_appointment_train', compact('appointment'));
    }

    function preview_appointment($id){
        
        $data_appointment = DB::table('appointments')
                ->join('training_types', 'training_types.id', '=', 'appointments.training_type_id')
                ->where('appointments.id' , $id)
                ->select('appointments.*', 'training_types.type_article')
                ->first();

        $type = $data_appointment->type ;

        $type_article = Training_type::get();
        $appointment_area = Appointment_area::orderBy('area','ASC')->get();

        return view('appointments.preview_appointment', compact('data_appointment','type_article','appointment_area' , 'type'));

    }

    function get_data_appointment($type){

        $data = [];

        if($type == 'all'){
            // $data['data_appointments'] = Appointment::orderBy('id' , 'DESC')->get();

            $data['data_appointments'] = DB::table('appointments')
                ->join('training_types', 'training_types.id', '=', 'appointments.training_type_id')
                ->leftJoin('users', 'users.id', '=', 'appointments.creator')
                ->select('appointments.*', 'training_types.type_article', 'users.name as name_creator')
                ->orderBy("id", "DESC")
                ->get();
        }
        else{
            // $data['data_appointments'] = Appointment::where('training_type_id', $type)
            //     ->orderBy("id", "DESC")
            //     ->get();

            $data['data_appointments'] = DB::table('appointments')
                ->join('training_types', 'training_types.id', '=', 'appointments.training_type_id')
                ->leftJoin('users', 'users.id', '=', 'appointments.creator')
                ->where('appointments.training_type_id', $type)
                ->select('appointments.*', 'training_types.type_article', 'users.name as name_creator')
                ->orderBy("id", "DESC")
                ->get();

            $data_Training_type = Training_type::where('id', $type)->first();
            $data['type_article'] = $data_Training_type->type_article ;
        }

        return $data;
    }

    function give_rating_appointment($user_id,$appointment_id,$selectedRating){

        $data_appointment = Appointment::where('id' , $appointment_id)->first();

        // User Like
        $new_user_like = array();
        if( !empty($data_appointment->user_like) ){
            $array = json_decode($data_appointment->user_like, true);
            if (!in_array($user_id, $array)) {
                // ถ้าไม่มี ให้เพิ่มค่า $user_id เข้าไป
                $array[] = $user_id;
            }
            $new_user_like = json_encode($array);
        }else{
            array_push($new_user_like, $user_id);
        }

        $data_appointment->user_like = $new_user_like ;
        $data_appointment->save();
        // END User Like

        // RATING
        if( empty($data_appointment->log_rating) ){

            $array_log[$user_id]['1']['status'] = 'Active';
            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['rating'] = $selectedRating;

        }else{

            $array_log = json_decode($data_appointment->log_rating, true);

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

        DB::table('appointments')
            ->where([ 
                    ['id', $appointment_id],
                ])
            ->update([
                    'log_rating' => $jsonLog,
                ]);

        $sum_rating = $this->sum_rating($appointment_id);
        // END RATING

        return $sum_rating;

    }

    function sum_rating($appointment_id){
        $data_appointment = Appointment::where('id' , $appointment_id)->first();
        $log_rating = $data_appointment->log_rating ;
        $user_like = $data_appointment->user_like ;

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

            DB::table('appointments')
            ->where([ 
                    ['id', $appointment_id],
                ])
            ->update([
                    'sum_rating' => $sum_rating,
                ]);

        }

        return $sum_rating ;

    }

    function user_cancel_like_appointment($user_id,$appointment_id){
        $data_appointment = Appointment::where('id' , $appointment_id)->first();
        $new_user_like = array();

        if( !empty($data_appointment->user_like) ){
            $array = json_decode($data_appointment->user_like, true);

            // เช็คว่าในอาร์เรย์มีค่า $user_id หรือไม่
            if (($key = array_search($user_id, $array)) !== false) {
                // ถ้ามี ให้ลบค่า $user_id ออกจากอาร์เรย์
                unset($array[$key]);
            }

            // จัดเรียงค่าดัชนีใหม่ของอาร์เรย์
            $array = array_values($array);

            $new_user_like = json_encode($array);

            $data_appointment->user_like = $new_user_like ;
            $data_appointment->save();

        }

        // RATING
        if( !empty($data_appointment->log_rating) ){

            $array_log = json_decode($data_appointment->log_rating, true);

            if (array_key_exists($user_id, $array_log)) {

                // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                foreach ($array_log[$user_id] as $round => $details) {
                    if (isset($details['status']) && $details['status'] === 'Active') {
                        $array_log[$user_id][$round]['status'] = 'Canceled';
                    }
                }
            }

            $jsonLog = json_encode($array_log);

            DB::table('appointments')
                ->where([ 
                        ['id', $appointment_id],
                    ])
                ->update([
                        'log_rating' => $jsonLog,
                    ]);

            }

            $sum_rating = $this->sum_rating($appointment_id);

        return $sum_rating;

    }

    function submit_reasons_dislike_appointment($user_id,$appointment_id,$reasons_dislike){

        $data_appointment = Appointment::where('id' , $appointment_id)->first();
        $array_log = array();

        if( empty($data_appointment->user_dislike) ){

            $array_log[$user_id]['1']['status'] = 'Active';
            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['reasons'] = $reasons_dislike;

        }else{

            $array_log = json_decode($data_appointment->user_dislike, true);

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

        DB::table('appointments')
            ->where([ 
                    ['id', $appointment_id],
                ])
            ->update([
                    'user_dislike' => $jsonLog,
                ]);

    }

    function user_cancel_dislike_appointment($user_id,$appointment_id){

        $data_appointment = Appointment::where('id' , $appointment_id)->first();
        $array_log = array();

        if( !empty($data_appointment->user_dislike) ){

            $array_log = json_decode($data_appointment->user_dislike, true);

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

        DB::table('appointments')
            ->where([ 
                    ['id', $appointment_id],
                ])
            ->update([
                    'user_dislike' => $jsonLog,
                ]);
    }

    function user_click_fav_btn_appointment($user_id,$appointment_id,$type){

        $data_appointment = Appointment::where('id' , $appointment_id)->first();
        $array_log = array();

        $data_for_table_fav = [];

        if($type == 'Yes'){

            if( empty($data_appointment->user_fav) ){

                $array_log[$user_id]['1']['status'] = 'Active';
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");

            }else{

                $array_log = json_decode($data_appointment->user_fav, true);

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
            $check_table_fav = Favorite::where('type','อบรม/สอบ')
                ->where('appointment_id',$appointment_id)
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
                $data_for_table_fav['type'] = 'อบรม/สอบ';
                $data_for_table_fav['user_id'] = $user_id;
                $data_for_table_fav['status'] = 'Yes';
                $data_for_table_fav['appointment_id'] = $appointment_id;

                Favorite::create($data_for_table_fav);
            }
            // END เพิ่มข้อมูลในตาราง FAV


        }
        else if($type == 'No'){
            if( !empty($data_appointment->user_fav) ){

                $array_log = json_decode($data_appointment->user_fav, true);

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
            $check_table_fav = Favorite::where('type','อบรม/สอบ')
                ->where('appointment_id',$appointment_id)
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

        DB::table('appointments')
            ->where([ 
                    ['id', $appointment_id],
                ])
            ->update([
                    'user_fav' => $jsonLog,
                ]);

        return 'success' ;

    }

    function update_user_view_appointment($user_id,$appointment_id){
        $data_appointment = Appointment::where('id' , $appointment_id)->first();
        $array_log = array();

        if( empty($data_appointment->user_view) ){

            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");

        }else{

            $array_log = json_decode($data_appointment->user_view, true);

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

        DB::table('appointments')
            ->where([ 
                    ['id', $appointment_id],
                ])
            ->update([
                    'user_view' => $jsonLog,
                ]);

        return 'success' ;
    }

    function get_data_appointment_now($training_type_id, $month, $year , $type_appointment){

        if($training_type_id == 'all'){
            $data = DB::table('appointments')
                ->join('training_types', 'training_types.id', '=', 'appointments.training_type_id')
                ->select('appointments.*', 'training_types.type_article')
                ->where('appointments.type', $type_appointment)
                ->where('appointments.status', 'Yes')
                ->whereYear('date_start', $year)
                ->whereMonth('date_start', $month)
                ->orderBy('date_start', 'ASC')
                ->orderBy('time_start', 'ASC')
                ->get();
        }
        else{
            $data = DB::table('appointments')
                ->join('training_types', 'training_types.id', '=', 'appointments.training_type_id')
                ->select('appointments.*', 'training_types.type_article')
                ->where('appointments.type', $type_appointment)
                ->where('appointments.status', 'Yes')
                ->where('training_types.id', $training_type_id)
                ->whereYear('date_start', $year)
                ->whereMonth('date_start', $month)
                ->orderBy('date_start', 'ASC')
                ->orderBy('time_start', 'ASC')
                ->get();
        }

        return $data ;

    }

    function get_data_appointment_now_quiz($month, $year , $area_id){

        $data = DB::table('appointments')
            ->join('training_types', 'training_types.id', '=', 'appointments.training_type_id')
            ->select('appointments.*', 'training_types.type_article')
            ->where('appointments.appointment_area_id', $area_id)
            ->where('appointments.type', 'สอบ')
            ->where('appointments.status', 'Yes')
            ->whereYear('date_start', $year)
            ->whereMonth('date_start', $month)
            ->orderBy('date_start', 'ASC')
            ->orderBy('time_start', 'ASC')
            ->get();

        return $data ;

    }

    function get_list_quiz_area(){

        $data = DB::table('appointment_areas')
                ->orderBy('area', 'ASC')
                ->orderBy('sub_area', 'ASC')
                ->get();

        return $data ;

    }

    function save_data_edit_appointment(Request $request)
    {
        $requestData = $request->all();

        $appointment = Appointment::findOrFail($requestData['id']);
        $appointment->update($requestData);

        return 'success' ;

    }

    public function log_appointments($id)
    {
        // $appointment = appointment::findOrFail($id);
        $appointment = DB::table('appointments')
                // ->join('appointment_types', 'appointment_types.id', '=', 'appointments.appointment_type_id')
                ->leftJoin('users', 'users.id', '=', 'appointments.creator')
                ->where('appointments.id' , $id)
                ->select('appointments.*',
                    DB::raw('SUBSTRING(REGEXP_REPLACE(REPLACE(appointments.detail, "&nbsp;", " "), "<[^>]*>", ""), 1, 350) as detail'),
                    // 'appointment_types.type_article',
                    'users.name as name_creator',
                )
                ->first();

        return view('appointments.log_appointment', compact('appointment'));
    }
}
