<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'account'; // กำหนดให้ใช้ 'account' แทน 'email'
    }

    public function login(Request $request)
    {
        $credentials = $request->only('account', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...

            // $data_user = Auth::user();

            // Log::create([
            //     "log_content"=> ' 001_Log in page',
            //     "user_id"=> $data_user->id,
            //     "role"=> $data_user->role,
            // ]);

            $data_user = Auth::user();

            if($data_user->check_video_congratulation == "No"){
                DB::table('users')
                    ->where([ 
                            ['id', $data_user->id],
                        ])
                    ->update([
                            'check_video_congratulation' => null,
                        ]);
            }
            
            if($data_user->check_video_welcome_page != "Yes"){
                return redirect("/video_instruction");
            }
            else{
                return redirect("/home");
            }

        }

        return redirect('login')->with('error', 'Login failed, please check your credentials.');
    }
}
