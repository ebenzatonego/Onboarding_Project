<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Video_welcome_page;
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

    function update_countTime_video_intro($user_id, $countTime){
        $video_intro = Video_welcome_page::where('type','Video_Intro')
            ->where('status','Yes')
            ->first();

        $array_log = array();

        if( empty($video_intro->log) ){
            $array_log[$user_id]['1'] = $countTime;
        }
        else{
            $array_log = json_decode($video_intro->log, true);

            if (array_key_exists($user_id, $array_log)) {
                // หากเท่ากันให้เพิ่ม key round และ time ใน key นั้น
                $count_round_old = count($array_log[$user_id]);
                $new_round = intval($count_round_old) + 1 ;
                $array_log[$user_id][$new_round] = $countTime;
            } else {
                // หากไม่เท่ากันให้เพิ่ม key ใหม่โดยใช้ $user_id
                $array_log[$user_id]['1'] = $countTime;
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

}
