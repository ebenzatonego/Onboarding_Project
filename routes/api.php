<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/check_pdpa/{account}', 'AdminController@check_pdpa');
Route::get('/update_pdpa/{account}', 'AdminController@update_pdpa');
Route::get('/get_user_for_view_CountTime/{users_id}', 'AdminController@get_user_for_view_CountTime');

Route::get('/change_status_video_intro/{click_id}', 'AdminController@change_status_video_intro');
Route::get('/get_video_intro', 'AdminController@get_video_intro');
Route::get('/get_data_video_intro_all', 'AdminController@get_data_video_intro_all');
Route::get('/update_countTime_video_intro/{user_id}/{countTime}', 'AdminController@update_countTime_video_intro');
Route::get('/get_data_for_calendar', 'AdminController@get_data_for_calendar');
Route::get('/skip_video_welcome/{user_id}/{skip_video_welcome}', 'AdminController@skip_video_welcome');

