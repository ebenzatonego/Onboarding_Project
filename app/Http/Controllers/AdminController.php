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

class AdminController extends Controller
{
    function check_pdpa($account){
        $data = User::where('account' , $account)->first();

        if($data){
            if( !empty($data->check_pdpa) ){
                $return = "Yes" ;
            }else{
                $return ="No" ;
            }
        }else{
            $return ="Account none" ;
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
        
        $data = Training::where('type_article' , 'ตารางอบรม')
            ->orWhere('type_article' , 'ตารางสอบ')
            ->get();

        return $data;
    }

    function index_user_excel(){
        return view('admin.index_user_excel');
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

}
