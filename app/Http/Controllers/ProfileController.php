<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Contact_upper_al;
use App\Models\Contact_group_manager;
use App\Models\Contact_area_supervisor;

class ProfileController extends Controller
{
    function view_profile(){

        $user_id = Auth::user()->id;
        $users = User::where('id' , $user_id)->first();
        $upper_al = Contact_upper_al::where('account' , $users->account_upper_al)->first();
        $group_manager = Contact_group_manager::where('account' , $users->account_group_manager)->first();
        $area_supervisor = Contact_area_supervisor::where('account' , $users->account_area_supervisor)->first();

        return view('profile/view_profile', compact('users','upper_al','group_manager','area_supervisor'));
    }
}
