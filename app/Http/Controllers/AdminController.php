<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Video_welcome_page;

class AdminController extends Controller
{
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
}
