<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function calendar_admin()
    {
        return view('admin.calendar_admin');
    }
}
