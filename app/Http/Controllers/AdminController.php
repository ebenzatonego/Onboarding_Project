<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Video_welcome_page;
use App\Models\Video_congrat;
use App\User;
use App\Models\Video_congrats_type_rank;
use App\Models\Content_popup;
use Illuminate\Support\Facades\Hash;
use App\Models\Contact_upper_al;
use App\Models\Contact_group_manager;
use App\Models\Contact_area_supervisor;
use Carbon\Carbon;
use App\Models\Log_excel_user;
use App\Models\Activity_type;
use App\Models\Activity;
use App\Models\Calendar;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AdminController extends Controller
{
    public function runCommands(Request $request)
    {
        $commands = [
            'cd /var/www/azsale/Onboarding_Project && php artisan cache:clear',
            'cd /var/www/azsale/Onboarding_Project && php artisan view:clear',
            'cd /var/www/azsale/Onboarding_Project && php artisan route:clear',
            'cd /var/www/azsale/Onboarding_Project && php artisan config:clear',
        ];

        foreach ($commands as $command) {
            $process = Process::fromShellCommandline($command);
            $process->run();

            if (!$process->isSuccessful()) {
                return response()->json(['error' => $process->getErrorOutput()], 500);
            }
        }

        return response()->json(['message' => 'Commands executed successfully']);
    }

    public function verify_account($account){
        $check_user = User::where('account' , $account)->first();

        if (!empty($check_user->id)) {
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'User found.',
                'account' => $check_user->account,
                'name' => $check_user->name
            ], 200); // HTTP status code 200: OK
        } else {
            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'User not found.'
            ], 404); // HTTP status code 404: Not Found
        }
    }

    public function confirmPassword(Request $request)
    {
        $user = Auth::user();
        $password = $request->input('password');

        if (Hash::check($password, $user->password)) {
            return response()->json(['valid' => true]);
        } else {
            return response()->json(['valid' => false]);
        }
    }


    function create_user_member(Request $request)
    {
        $requestData = $request->all();
    
        foreach ($requestData as $item) {
            $data_arr = [];
            foreach ($item as $key => $value) {

                if($key == "password"){
                    $data_arr['password'] = Hash::make($value);
                }
                else if ($key == "license_start" || $key == "license_expire") {
                    $data_arr[$key] = $value;
                    if (!empty($data_arr[$key])) {
                        if (is_numeric($value)) {
                            $date = $this->convertExcelDate($value);
                        } else {
                            $date = Carbon::createFromFormat('d-m-Y', $value);
                            if ($date->year > 2500) {
                                $date->subYears(543); // ลบ 543 ปีเพื่อแปลงเป็นปีคริสต์ศักราช
                            }
                        }
                        $data_arr[$key] = $date->format('Y-m-d');
                    }
                } else if ($key == "ic_license_start" || $key == "ic_license_expire") {
                    $data_arr[$key] = $value;
                    if (!empty($data_arr[$key])) {
                        if (is_numeric($value)) {
                            $date = $this->convertExcelDate($value);
                        } else {
                            $date = convertThaiToGregorian($value);
                        }
                        $data_arr[$key] = $date;
                    }
                }
                else{
                    $data_arr[$key] = $value;
                }
            }

            $check_user = User::where('account',$data_arr['account'])->first();

            if( !empty($check_user->account) ){

                // Check if current_rank is different
                if ($check_user->current_rank != $data_arr['current_rank']) {
                    // Move current_rank to last_rank
                    $check_user->last_rank = $check_user->current_rank;
                    // Update current_rank with the new value
                    $check_user->current_rank = $data_arr['current_rank'];
                }
    
                foreach ($data_arr as $key => $value) {
                    if ($key != 'account' && $key != 'phone' && $key != 'email' && $key != 'nickname') {
                        // ยกเว้น account, phone, email และ nickname ไม่ต้องอัปเดต
                        $check_user->$key = $value;
                    }
                }
                $check_user->save();

            }else{
                User::create($data_arr);
            }
        }

        return "success" ;

    }

    function convertExcelDate($excelDateValue) {
        $startDate = Carbon::createFromDate(1900, 1, 1);
        $date = $startDate->addDays($excelDateValue - 2);

        if ($date->year > 2550) {
            $date->subYears(543); // ลบ 543 ปีเพื่อแปลงเป็นปีคริสต์ศักราช
        }

        return $date->format('Y-m-d');
    }


    function convertThaiToGregorian($thaiDate) {
        $date = Carbon::createFromFormat('d/m/Y', $thaiDate);
        if ($date->year > 2500) {
            $date->subYears(543); // ลบ 543 ปีเพื่อแปลงเป็นปีคริสต์ศักราช
        }
        return $date->format('Y-m-d');
    }

    function create_user_upper_al(Request $request)
    {
        $requestData = $request->all();
        
        foreach ($requestData as $item) {
            $data_arr = [];
            foreach ($item as $key => $value) {
                if($key == "password"){
                    $data_arr['password'] = Hash::make($value);
                }else{
                    $data_arr[$key] = $value;
                }
            }

            $upper_al = Contact_upper_al::where('account',$data_arr['account'])->first();

            if( !empty($upper_al->account) ){
                foreach ($data_arr as $key => $value) {
                    if ($key != 'account') { // ยกเว้น account ไม่ต้องอัปเดต
                        $upper_al->$key = $value;
                    }
                }
                $upper_al->save();
            }else{
                Contact_upper_al::create($data_arr);
            }
        }

        return "success" ;

    }

    function create_user_group_manager(Request $request)
    {
        $requestData = $request->all();
        
        foreach ($requestData as $item) {
            $data_arr = [];
            foreach ($item as $key => $value) {
                if($key == "password"){
                    $data_arr['password'] = Hash::make($value);
                }else{
                    $data_arr[$key] = $value;
                }
            }

            $group_manager = Contact_group_manager::where('account',$data_arr['account'])->first();

            if( !empty($group_manager->account) ){
                foreach ($data_arr as $key => $value) {
                    if ($key != 'account') { // ยกเว้น account ไม่ต้องอัปเดต
                        $group_manager->$key = $value;
                    }
                }
                $group_manager->save();
            }else{
                Contact_group_manager::create($data_arr);
            }
        }

        return "success" ;

    }

    function create_user_area_supervisor(Request $request)
    {
        $requestData = $request->all();
        
        foreach ($requestData as $item) {
            $data_arr = [];
            foreach ($item as $key => $value) {
                if($key == "password"){
                    $data_arr['password'] = Hash::make($value);
                }else{
                    $data_arr[$key] = $value;
                }
            }

            $area_supervisor = Contact_area_supervisor::where('area',$data_arr['area'])->first();

            if( !empty($area_supervisor->area) ){
                foreach ($data_arr as $key => $value) {
                    if ($key != 'area') { // ยกเว้น area ไม่ต้องอัปเดต
                        $area_supervisor->$key = $value;
                    }
                }
                $area_supervisor->save();
            }else{
                Contact_area_supervisor::create($data_arr);
            }
        }

        return "success" ;

    }

    function edit_profile(Request $request)
    {
        $requestData = $request->all();

        $users = User::where('id',$requestData['id'])->first();
        $account = $users->account ;

        foreach ($requestData as $key => $value) {
            if ($key != 'id') { // ยกเว้น id ไม่ต้องอัปเดต
                $users->$key = $value;
            }
        }
        $users->save();

        $check_upper_al = Contact_upper_al::where('account' , $account)->first();
        $check_group_manager = Contact_group_manager::where('account' , $account)->first();

        // Update upper_al
        if( !empty($check_upper_al->id) ){
            foreach ($requestData as $key_1 => $value_1) {
                if ($key_1 != 'id') { // ยกเว้น id ไม่ต้องอัปเดต
                    $check_upper_al->$key_1 = $value_1;
                }
            }
            $check_upper_al->save();
        }

        // Update group_manager
        if( !empty($check_group_manager->id) ){
            foreach ($requestData as $key_2 => $value_2) {
                if ($key_2 != 'id') { // ยกเว้น id ไม่ต้องอัปเดต
                    $check_group_manager->$key_2 = $value_2;
                }
            }
            $check_group_manager->save();
        }

        return "success" ;

    }

    function check_pdpa($account){
        $data = User::where('account' , $account)->first();

        if( !empty($data->account) ){
            if( !empty($data->check_pdpa) ){
                $return = "Yes" ;
            }else{
                $return = "No" ;
            }
        }else{
            $return = "Account none" ;
        }
        
        return $return;
    }

    function update_pdpa($account){
        DB::table('users')
            ->where([ 
                    ['account', $account],
                ])
            ->update([
                    'check_pdpa' => "Yes",
                ]);
        
        return 'ok';
    }

    function update_check_birthday($user_id){
        DB::table('users')
            ->where([ 
                    ['id', $user_id],
                ])
            ->update([
                    'check_birthday' => "Yes",
                ]);
        
        return 'ok';
    }

    public function calendar_admin()
    {
        return view('admin.calendar_admin');
    }

    function get_data_for_calendar(){
        
        // กิจกรรม
        $data_activitys = DB::table('activitys')
            ->join('activity_types', 'activity_types.id', '=', 'activitys.activity_type_id')
            ->select('activitys.*', 'activity_types.name_type')
            ->orderBy('activitys.date_start' , 'ASC')
            ->orderBy('activitys.time_start' , 'ASC')
            ->get();

        // ตารางอบรม
        $data_train = DB::table('appointments')
            ->join('training_types', 'training_types.id', '=', 'appointments.training_type_id')
            ->where('type' , 'อบรม')
            ->select('appointments.*', 'training_types.type_article')
            ->orderBy('appointments.date_start' , 'ASC')
            ->orderBy('appointments.time_start' , 'ASC')
            ->get();

        // ตารางสอบ
        $data_quiz = DB::table('appointments')
            ->join('training_types', 'training_types.id', '=', 'appointments.training_type_id')
            ->leftJoin('appointment_areas', 'appointment_areas.id', '=', 'appointments.appointment_area_id')
            ->where('type' , 'สอบ')
            ->select('appointments.*', 'training_types.type_article', 'appointment_areas.area', 'appointment_areas.sub_area')
            ->orderBy('appointments.date_start' , 'ASC')
            ->orderBy('appointments.time_start' , 'ASC')
            ->get();

        $data = [];
        $data['activitys'] = $data_activitys;
        $data['train'] = $data_train;
        $data['quiz'] = $data_quiz;

        return $data;
    }

    function get_edit_data_calendar($id){
        $data_calendars = Calendar::where('id' , $id)->first();

        return $data_calendars ;
    }

    function cf_edit_data_calendar(Request $request)
    {
        $requestData = $request->all();
        
        $calendar = Calendar::where('id' ,$requestData['id'])->first();
        $calendar->update($requestData);

        return 'success' ;

    }

    function get_data_for_calendar_for_user($user_id){

        // favorites join appointments (ตารางอบรม / สอบ)
        $data_appointments = DB::table('favorites')
            ->join('appointments', 'appointments.id', '=', 'favorites.appointment_id')
            ->leftJoin('training_types', 'training_types.id', '=', 'appointments.training_type_id')
            ->where('favorites.user_id' ,$user_id)
            ->where('favorites.status' , 'Yes')
            ->select('favorites.*',
                    'training_types.type_article',
                    'appointments.title',
                    'appointments.type as type_appointments',
                    'appointments.all_day',
                    'appointments.date_start',
                    'appointments.date_end',
                    'appointments.time_start',
                    'appointments.time_end',
                )
            ->orderBy('appointments.date_start' , 'ASC')
            ->orderBy('appointments.time_start' , 'ASC')
            ->get();

        // favorites join activitys (กิจกรรม)
        $data_activitys = DB::table('favorites')
            ->join('activitys', 'activitys.id', '=', 'favorites.activity_id')
            ->leftJoin('activity_types', 'activity_types.id', '=', 'activitys.activity_type_id')
            ->where('favorites.user_id' ,$user_id)
            ->where('favorites.status' , 'Yes')
            ->select('favorites.*',
                    'activity_types.name_type',
                    'activitys.title',
                    'activitys.all_day',
                    'activitys.date_start',
                    'activitys.date_end',
                    'activitys.time_start',
                    'activitys.time_end',
                )
            ->orderBy('activitys.date_start' , 'ASC')
            ->orderBy('activitys.time_start' , 'ASC')
            ->get();

        // MEMO
        $data_calendars = DB::table('calendars')
            ->where('user_id' ,$user_id)
            ->orderBy('calendars.date_start' , 'ASC')
            ->orderBy('calendars.time_start' , 'ASC')
            ->get();

        // my_goal_users
        $my_goal_users = DB::table('my_goal_users')
            ->where('user_id', $user_id)
            ->get();

        $my_goal_users = $my_goal_users->map(function ($item) {
            $item->type = 'my_goal';
            $item->all_day = 'Yes';
            $item->time_start = '00:00:00';
            return $item;
        });



        // $data = [];
        // แปลงคอลเลกชันให้อยู่ในรูปแบบของอาร์เรย์
        $data_appointments = $data_appointments->toArray();
        $data_activitys = $data_activitys->toArray();
        $data_calendars = $data_calendars->toArray();
        $my_goal_users = $my_goal_users->toArray();

        // รวมคอลเลกชันเข้าด้วยกัน
        $data = array_merge($data_appointments, $data_activitys, $data_calendars, $my_goal_users);

        // เรียงลำดับข้อมูลตาม date_start และ time_start (ถ้ามี time_start)
        usort($data, function($a, $b) {
            if ($a->date_start == $b->date_start) {
                return $a->time_start <=> $b->time_start;
            }
            return $a->date_start <=> $b->date_start;
        });

        if (empty($data)) {
            return [];
        }

        return $data ;

    }

    function index_user_excel(){
        return view('admin.index_user_excel');
    }

    function list_admin(){
        return view('admin.list_admin');
    }

    function list_upper_al(){
        return view('admin.list_upper_al');
    }
    function member(){
        return view('admin.member');
    }   
    function group_manager(){
        return view('admin.group_manager');
    }   
    function area_supervisor(){
        return view('admin.area_supervisor');
    }
    function skip_video_welcome($user_id , $skip_video_welcome){

        if($skip_video_welcome == "No"){
            $skip_video_welcome = null ;
        }

        DB::table('users')
            ->where([ 
                    ['id', $user_id],
                ])
            ->update([
                    'check_video_welcome_page' => $skip_video_welcome,
                ]);

        return "success" ;

    }

    function skip_video_congrats($user_id , $skip_video_congrats){

        if($skip_video_congrats == "No"){
            $skip_video_congrats = null ;
        }

        DB::table('users')
            ->where([ 
                    ['id', $user_id],
                ])
            ->update([
                    'check_video_congratulation' => $skip_video_congrats,
                ]);

        return "success" ;

    }

    function skip_content_popup($user_id , $skip_content_popup){

        DB::table('users')
            ->where([ 
                    ['id', $user_id],
                ])
            ->update([
                    'check_content_popup' => $skip_content_popup,
                ]);

        return "success" ;

    }

    function get_video_intro(){
        $data = Video_welcome_page::where('type','Video_Intro')
            ->where('status','Yes')
            ->first();

        return $data->video ;
    }

    function get_video_congrats($user_id){

        $users = User::where('id' , $user_id)->first();
        $type_rank = $users->current_rank;

        $data = Video_congrat::where('type','Video_Congrats')
            ->where('status','Yes')
            ->where('for_rank',$type_rank)
            ->first();

        return $data->video ;
    }

    function get_data_video_intro_all(){
        // $data = Video_welcome_page::where('type','Video_Intro')
        //     ->get();

        $data = DB::table('video_welcome_pages')
            ->join('users', 'video_welcome_pages.user_id', '=', 'users.id')
            ->where('video_welcome_pages.type','Video_Intro')
            ->select('video_welcome_pages.*','users.name as name_user')
            ->get();

        return $data ;
    }

    function get_data_content_popup(){
        $data = DB::table('content_popups')
            ->join('users', 'content_popups.user_id', '=', 'users.id')
            ->select('content_popups.*','users.name as name_user')
            ->get();

        return $data ;
    }

    function get_data_video_congrats_all(){
        // $data = Video_congrat::where('type','Video_Congrats')
        //     ->get();

        $data = DB::table('video_congrats')
            ->join('users', 'video_congrats.user_id', '=', 'users.id')
            ->where('video_congrats.type','Video_Congrats')
            ->select('video_congrats.*','users.name as name_user')
            ->get();

        return $data ;
    }

    function update_countTime_video_intro($user_id, $countTime){
        $video_intro = Video_welcome_page::where('type','Video_Intro')
            ->where('status','Yes')
            ->first();

        $array_log = array();

        if( empty($video_intro->log) ){
            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['countTime'] = $countTime;
        }
        else{
            $array_log = json_decode($video_intro->log, true);

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

        DB::table('video_welcome_pages')
            ->where([ 
                    ['id', $video_intro->id],
                ])
            ->update([
                    'log' => $jsonLog,
                ]);

        return "ok";

    }

    function update_countTime_video_congrats($user_id, $countTime){

        $users = User::where('id' , $user_id)->first();
        $type_rank = $users->current_rank;

        $video_congrats = Video_congrat::where('type','Video_Congrats')
            ->where('for_rank',$type_rank)
            ->where('status','Yes')
            ->first();

        $array_log = array();

        if( empty($video_congrats->log) ){
            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['countTime'] = $countTime;
        }
        else{
            $array_log = json_decode($video_congrats->log, true);

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

        DB::table('video_congrats')
            ->where([ 
                    ['id', $video_congrats->id],
                ])
            ->update([
                    'log' => $jsonLog,
                ]);

        return "ok";

    }

    function update_countTime_content_popup($user_id, $countTime){

        $data_content_popup = Content_popup::where('status','Yes')->first();

        $array_log = array();

        if( empty($data_content_popup->log_video) ){
            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['countTime'] = $countTime;
        }
        else{
            $array_log = json_decode($data_content_popup->log_video, true);

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

        DB::table('content_popups')
            ->where([ 
                    ['id', $data_content_popup->id],
                ])
            ->update([
                    'log_video' => $jsonLog,
                ]);

        return "ok";

    }

    function update_check_video_congratulation($user_id, $skip_video_congrats){

        if($skip_video_congrats == "No"){
            DB::table('users')
            ->where([ 
                    ['id', $user_id],
                ])
            ->update([
                    'check_video_congratulation' => "No",
                ]);
        }

        return "success" ;

    }

    function change_status_video_intro($click_id){

        $video_intro = Video_welcome_page::where('id',$click_id)->first();

        $data_arr = [];
        $data_arr['open'] = '';
        $data_arr['off'] = '';

        if($video_intro->status == "Yes"){
            DB::table('video_welcome_pages')
            ->where([ 
                    ['id', $video_intro->id],
                ])
            ->update([
                    'status' => null,
                ]);

            $data_arr['off'] = strval($video_intro->id);
        }
        else{
            $video_intro_Yes = Video_welcome_page::where('type','Video_Intro')
                ->where('status','Yes')
                ->first();

            if( !empty($video_intro_Yes->id) ){
                DB::table('video_welcome_pages')
                ->where([ 
                        ['id', $video_intro_Yes->id],
                    ])
                ->update([
                        'status' => null,
                    ]);

                
                $data_arr['off'] = strval($video_intro_Yes->id);
            }

            DB::table('video_welcome_pages')
                ->where([ 
                        ['id', $click_id],
                    ])
                ->update([
                        'status' => 'Yes',
                    ]);

            $data_arr['open'] = strval($click_id);
        }

        return $data_arr ;

    }

    function change_status_video_congrats($click_id){

        $video_congrat = Video_congrat::where('id',$click_id)->first();

        $data_arr = [];
        $data_arr['open'] = '';
        $data_arr['off'] = '';

        if($video_congrat->status == "Yes"){
            DB::table('video_congrats')
            ->where([ 
                    ['id', $video_congrat->id],
                ])
            ->update([
                    'status' => null,
                ]);

            DB::table('video_congrats_type_ranks')
            ->where([ 
                    ['name_rank', $video_congrat->for_rank],
                ])
            ->update([
                    'check_active' => null,
                ]);

            $data_arr['off'] = strval($video_congrat->id);
        }
        else{
            $video_congrat_Yes = Video_congrat::where('type','Video_Congrats')
                ->where('status','Yes')
                ->where('for_rank',$video_congrat->for_rank)
                ->first();

            if( !empty($video_congrat_Yes->id) ){
                DB::table('video_congrats')
                ->where([ 
                        ['id', $video_congrat_Yes->id],
                    ])
                ->update([
                        'status' => null,
                    ]);

                
                $data_arr['off'] = strval($video_congrat_Yes->id);
            }

            DB::table('video_congrats')
                ->where([ 
                        ['id', $click_id],
                    ])
                ->update([
                        'status' => 'Yes',
                    ]);

            DB::table('video_congrats_type_ranks')
            ->where([ 
                    ['name_rank', $video_congrat->for_rank],
                ])
            ->update([
                    'check_active' => 'Yes',
                ]);

            $data_arr['open'] = strval($click_id);
        }

        return $data_arr ;

    }

    function change_status_content_popup($click_id){

        $data = Content_popup::where('id',$click_id)->first();

        $data_arr = [];
        $data_arr['open'] = '';
        $data_arr['off'] = '';

        if($data->status == "Yes"){
            DB::table('content_popups')
            ->where([ 
                    ['id', $data->id],
                ])
            ->update([
                    'status' => null,
                ]);

            $data_arr['off'] = strval($data->id);
        }
        else{
            $data_yes = Content_popup::where('status','Yes')->first();

            if( !empty($data_yes->id) ){
                DB::table('content_popups')
                ->where([ 
                        ['id', $data_yes->id],
                    ])
                ->update([
                        'status' => null,
                    ]);

                
                $data_arr['off'] = strval($data_yes->id);
            }

            DB::table('content_popups')
                ->where([ 
                        ['id', $click_id],
                    ])
                ->update([
                        'status' => 'Yes',
                    ]);

            $data_arr['open'] = strval($click_id);
        }

        return $data_arr ;

    }

    function get_user_for_view_CountTime($user_id){
        $data_user = User::where('id',$user_id)
            ->select('name','account','photo')
            ->first();

        return $data_user ;
    }

    function get_rank_type_video_congrats(){
        $data = Video_congrats_type_rank::get();
        return $data ;
    }

    function reset_check_video_welcome_page(){
        DB::table('users')
            ->where([ 
                    ['check_video_welcome_page', "Yes"],
                ])
            ->update([
                    'check_video_welcome_page' => null,
                ]);

        return "success" ;
    }

    function reset_check_content_popup(){
        DB::table('users')
            ->where([ 
                    ['check_content_popup', "Yes"],
                ])
            ->update([
                    'check_content_popup' => null,
                ]);

        return "success" ;
    }

    function reset_check_video_congrats($type){
        DB::table('users')
            ->where([ 
                    ['current_rank', $type],
                    ['check_video_congratulation', "Yes"],
                ])
            ->update([
                    'check_video_congratulation' => null,
                ]);

        return "success" ;
    }

    function get_last_update_users(){
        
        $return = [];
        $data = User::latest()->first();

        $user_admin = User::where('role' , 'Super-admin')
            ->orWhere('role' , 'Admin')
            ->get();
        $user_staff = User::where('role' , 'staff')
            ->get();

        // $user_member = User::where('role' , 'member')->get();

        $count_user_member = User::where('role', 'member')->count();

        $upper_al = Contact_upper_al::get();
        $group_manager = Contact_group_manager::get();
        $area_supervisor = Contact_area_supervisor::get();
        
        $return['last_update'] = $data->updated_at;
        $return['count_admin'] = count($user_admin);
        $return['count_staff'] = count($user_staff);
        // $return['count_user'] = count($user_member);
        $return['count_user'] = $count_user_member;
        $return['count_upper_al'] = count($upper_al);
        $return['count_group_manager'] = count($group_manager);
        $return['count_area_supervisor'] = count($area_supervisor);

        return $return ;
    }

    function create_log_excel_users(Request $request)
    {
        $requestData = $request->all();

        Log_excel_user::create($requestData);

        return 'success' ;
        // return $requestData ;
    }

    function get_log_excel_users(){
        // $data = Log_excel_user::get();
        $data = DB::table('log_excel_users')
            ->join('users', 'log_excel_users.user_id', '=', 'users.id')
            ->select('log_excel_users.*','users.name as name_user')
            ->orderBy('log_excel_users.id' , 'DESC')
            ->get();
        return $data ;
    }

    function get_list_admin(){
        $user_admin = User::where('role' , 'Super-admin')
            ->orWhere('role' , 'Admin')
            ->orWhere('role' , 'staff')
            ->get();
        return $user_admin ;
    }

    function get_list_upper_al(){
        $upper_al = Contact_upper_al::get();
        return $upper_al ;
    }

    // function get_list_member(){
    //     $member = User::where('role','member')->get();
    //     return $member ;
    // }

    public function get_list_member(Request $request) {
        $limit = $request->input('limit', 350); // จำนวนแถวต่อครั้ง, ค่าเริ่มต้นคือ 350
        $page = $request->input('page', 1); // หน้าที่จะดึงข้อมูล
        $offset = ($page - 1) * $limit;
        
        $members = User::where('role', 'member')
                       ->offset($offset)
                       ->limit($limit)
                       ->get();

        return response()->json($members);
    }


    function get_group_manager(){
        $group_manager = Contact_group_manager::get();
        return $group_manager ;
    }
    function get_area_supervisor(){
        $area_supervisor = Contact_area_supervisor::get();
        return $area_supervisor ;
    }
    function save_log_share($user_id, $type_table, $type_social, $id){

        $data = DB::table($type_table)->where('id', $id)->first();

        if( empty($data->user_share) ){

            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['social'] = $type_social;

        }else{

            $array_log = json_decode($data->user_share, true);

            if (array_key_exists($user_id, $array_log)) {

                // หากเท่ากันให้เพิ่ม key round และ time ใน key นั้น
                $count_round_old = count($array_log[$user_id]);
                $new_round = intval($count_round_old) + 1 ;

                $array_log[$user_id][$new_round]['datetime'] = date("d/m/Y H:i");
                $array_log[$user_id][$new_round]['social'] = $type_social;
            } else {
                // หากไม่เท่ากันให้เพิ่ม key ใหม่โดยใช้ $user_id
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
                $array_log[$user_id]['1']['social'] = $type_social;
            }

        }

        $jsonLog = json_encode($array_log);

        DB::table($type_table)
            ->where([ 
                    ['id', $id],
                ])
            ->update([
                    'user_share' => $jsonLog,
                ]);

        return 'success' ;

    }

    function update_coc_of_user($user_id){
        DB::table('users')
            ->where([ 
                    ['id', $user_id],
                ])
            ->update([
                    'check_coc' => 'Yes',
                ]);

        return 'success' ;
    }


    function edit_area_super_visor(Request $request)
    {
        $requestData = $request->all();

        $area_supervisor = Contact_area_supervisor::findOrFail($requestData['id']);
        $area_supervisor->update($requestData);

        return 'success' ;
        

    }

    function gat_data_of_notification($user_id){

        $data_arr = [];
        $currentDateTime = Carbon::now();


        // เฉพาะคุณ => วันเกิด
        $data_user_birthday = DB::table('users')
            ->where('id', $user_id)
            ->select('birthday', 'name')
            ->get();

        foreach ($data_user_birthday as $user) {

            if( !empty($user->birthday) ){
                $birthday = Carbon::createFromFormat('d-m-Y', $user->birthday);

                // ตรวจสอบว่าวันและเดือนของวันเกิดตรงกับวันและเดือนปัจจุบันหรือไม่
                if ($birthday->day == $currentDateTime->day && $birthday->month == $currentDateTime->month) {
                    $data_arr[] = [
                        'type' => 'เฉพาะคุณ',
                        'sub_type' => 'วันเกิด',
                        'name' => $user->name,
                        'days_difference' => 0, // จำนวนวันที่ต่างกัน
                    ];
                }
            }
        }

        // เฉพาะคุณ => บัตรหมดอายุ
        $data_user_license_expire = DB::table('users')
            ->where('id', $user_id)
            ->where('license_expire', '!=' , null)
            ->select('license_expire')
            ->get();

        foreach ($data_user_license_expire as $license) {

            if( !empty($license->license_expire) ){
                $datetimeStart_5 = Carbon::parse($license->license_expire);
                $difference_5 = $currentDateTime->diffInDays($datetimeStart_5); // คำนวณห่างกี่วัน

                if ($difference_5 <= 90) {
                    $data_arr[] = [
                        'type' => 'เฉพาะคุณ',
                        'sub_type' => 'บัตรหมดอายุ',
                        'license_expire' => $license->license_expire,
                        'days_difference' => $difference_5, // จำนวนวันที่ต่างกัน
                    ];
                }
            }
        }

        // เฉพาะคุณ => แจ้งเตือนเป้าหมาย
        if ($currentDateTime->day == 1) {
            // echo "วันนี้เป็นวันที่ 1 ของเดือน";
            $my_goal_users = DB::table('my_goal_users')
                ->where('user_id', $user_id)
                ->where('status' , null)
                ->get();

            foreach ($my_goal_users as $my_goal) {

                if( !empty($my_goal->date_end) ){
                    $datetimeStart_6 = Carbon::parse($my_goal->date_end);
                    $difference_6 = $currentDateTime->diffInDays($datetimeStart_6); // คำนวณห่างกี่วัน

                    $data_arr[] = [
                        'type' => 'เฉพาะคุณ',
                        'sub_type' => 'แจ้งเตือนเป้าหมาย',
                        'period' => $my_goal->period,
                        'goal' => $my_goal->goal,
                        'price' => $my_goal->price,
                        'days_difference' => $difference_6, // จำนวนวันที่ต่างกัน
                    ];
                }
            }
        }


        // ข่าวสาร
        $data_news = DB::table('news')
            ->where('status', 'Yes')
            ->get();

        foreach ($data_news as $news) {

            if( !empty($news->datetime_start) ){
                $datetimeStart_1 = Carbon::parse($news->datetime_start);
                $difference_1 = $currentDateTime->diffInDays($datetimeStart_1); // คำนวณห่างกี่วัน

                if ($difference_1 <= 7) {
                    $data_arr[] = [
                        'type' => 'ข่าวสาร',
                        'id' => $news->id,
                        'title' => $news->title,
                        'photo' => $news->photo_cover,
                        'detail' => $news->detail,
                        'days_difference' => $difference_1, // จำนวนวันที่ต่างกัน
                    ];
                }
            }
        }


        // บริษัท (กิจกรรม)
        $data_activitys = DB::table('favorites')
            ->join('activitys', 'activitys.id', '=', 'favorites.activity_id')
            ->where('favorites.user_id', $user_id)
            ->where('favorites.status', 'Yes')
            ->where('activitys.status', 'Yes')
            ->select(
                'activitys.id',
                'activitys.title',
                'activitys.photo',
                'activitys.detail',
                'activitys.all_day',
                'activitys.date_start',
            )
            ->get();

        foreach ($data_activitys as $activity) {

            if( !empty($activity->date_start) ){
                $datetimeStart_2 = Carbon::parse($activity->date_start);
                $difference_2 = $currentDateTime->diffInDays($datetimeStart_2); // คำนวณห่างกี่วัน

                if ($difference_2 <= 3) {
                    $data_arr[] = [
                        'type' => 'บริษัท',
                        'id' => $activity->id,
                        'title' => $activity->title,
                        'photo' => $activity->photo,
                        'detail' => $activity->detail,
                        'days_difference' => $difference_2, // จำนวนวันที่ต่างกัน
                    ];
                }
            }
        }


        // อบรม,สอบ => อบรม
        // $data_trainings = DB::table('favorites')
        //     ->join('trainings', 'trainings.id', '=', 'favorites.training_id')
        //     ->where('favorites.user_id', $user_id)
        //     ->where('favorites.status', 'Yes')
        //     ->where('trainings.status', 'Yes')
        //     ->select(
        //         'trainings.id',
        //         'trainings.title',
        //         'trainings.photo',
        //         'trainings.detail',
        //         'trainings.datetime_start',
        //     )
        //     ->get();

        // foreach ($data_trainings as $training) {
        //     $datetimeStart_3 = Carbon::parse($training->datetime_start);
        //     $difference_3 = $currentDateTime->diffInDays($datetimeStart_3); // คำนวณห่างกี่วัน

        //     if ($difference_3 <= 3) {
        //         $data_arr[] = [
        //             'type' => 'อบรม,สอบ',
        //             'id' => $training->id,
        //             'title' => $training->title,
        //             'photo' => $training->photo,
        //             'detail' => $training->detail,
        //             'days_difference' => $difference_3, // จำนวนวันที่ต่างกัน
        //         ];
        //     }
        // }

        // อบรม,สอบ => สอบ
        $data_appointments = DB::table('favorites')
            ->join('appointments', 'appointments.id', '=', 'favorites.appointment_id')
            ->where('favorites.user_id', $user_id)
            ->where('favorites.status', 'Yes')
            ->where('appointments.status', 'Yes')
            ->select(
                'appointments.id',
                'appointments.title',
                'appointments.type',
                'appointments.photo',
                'appointments.detail',
                'appointments.location_detail',
                'appointments.all_day',
                'appointments.date_start',
                'appointments.date_end',
                'appointments.time_start',
                'appointments.time_end',
            )
            ->get();

        foreach ($data_appointments as $appointment) {

            if( !empty($appointment->date_start) ){
                $datetimeStart_4 = Carbon::parse($appointment->date_start);
                $difference_4 = $currentDateTime->diffInDays($datetimeStart_4); // คำนวณห่างกี่วัน

                if ($difference_4 <= 3) {
                    $data_arr[] = [
                        'type' => 'อบรม,สอบ',
                        'id' => $appointment->id,
                        'sub_type' => $appointment->type,
                        'title' => $appointment->title,
                        'photo' => $appointment->photo,
                        'location_detail' => $appointment->location_detail,
                        'all_day' => $appointment->all_day,
                        'date_start' => $appointment->date_start,
                        'date_end' => $appointment->date_end,
                        'time_start' => $appointment->time_start,
                        'time_end' => $appointment->time_end,
                        'days_difference' => $difference_4, // จำนวนวันที่ต่างกัน
                    ];
                }
            }
        }


        // เรียงลำดับ $data_arr ตาม days_difference จากน้อยไปมาก
        usort($data_arr, function ($a, $b) {
            return $a['days_difference'] - $b['days_difference'];
        });

        return $data_arr ;

    }

    function getUsers_for_export(Request $request)
    {
        $userIds = $request->input('userIds');

        // ดึงข้อมูลผู้ใช้จากฐานข้อมูลตาม id
        $users = User::whereIn('id', $userIds)->get([
            'name',
            'nickname',
            'email',
            'role',
            'account',
            'photo',
            'birthday',
            'current_rank',
            'last_rank',
            'phone',
            'address',
            'account_upper_al',
            'account_group_manager',
            'account_area_supervisor',
            'check_pdpa',
            'check_coc',
            'position',
            'organization_code',
            'organization_name',
            'area',
            'branch_code',
            'branch_name',
            'group_code',
            'license',
            'license_start',
            'license_expire',
            'ic_license',
            'ic_license_start',
            'ic_license_expire',
            'clm',
            'elite_agency',
            'agent_status',
            'status_login'
        ]);

        return response()->json($users);

    }

    function get_user_for_log($user_id){
        $data_user = User::where('id',$user_id)
            ->select('name' , 'account')
            ->first();
        return $data_user ;
    }
}
