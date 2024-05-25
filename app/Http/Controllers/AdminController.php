<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Video_welcome_page;
use App\Models\Video_congrat;
use App\User;

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

    function get_video_intro(){
        $data = Video_welcome_page::where('type','Video_Intro')
            ->where('status','Yes')
            ->first();

        return $data->video ;
    }

    function get_data_video_intro_all(){
        $data = Video_welcome_page::where('type','Video_Intro')
            ->get();

        return $data ;
    }

    function get_data_video_congrats_all(){
        $data = Video_congrat::where('type','Video_Congrats')
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

            $data_arr['off'] = strval($video_congrat->id);
        }
        else{
            $video_congrat_Yes = Video_congrat::where('type','Video_Congrats')
                ->where('status','Yes')
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

}
