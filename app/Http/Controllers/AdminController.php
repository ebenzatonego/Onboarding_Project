<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;

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
}
