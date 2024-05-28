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
Route::get('/update_check_birthday/{user_id}', 'AdminController@update_check_birthday');
Route::get('/get_last_update_users', 'AdminController@get_last_update_users');
Route::post('/create_user_member/excel', 'AdminController@create_user_member');
Route::post('/create_user_upper_al/excel', 'AdminController@create_user_upper_al');
Route::post('/create_user_group_manager/excel', 'AdminController@create_user_group_manager');
Route::post('/create_user_area_supervisor/excel', 'AdminController@create_user_area_supervisor');


// Video INTRO
Route::get('/change_status_video_intro/{click_id}', 'AdminController@change_status_video_intro');
Route::get('/get_video_intro', 'AdminController@get_video_intro');
Route::get('/get_data_video_intro_all', 'AdminController@get_data_video_intro_all');
Route::get('/update_countTime_video_intro/{user_id}/{countTime}', 'AdminController@update_countTime_video_intro');
Route::get('/skip_video_welcome/{user_id}/{skip_video_welcome}', 'AdminController@skip_video_welcome');
Route::get('/get_user_for_view_CountTime/{users_id}', 'AdminController@get_user_for_view_CountTime');
Route::get('/reset_check_video_welcome_page', 'AdminController@reset_check_video_welcome_page');

// Video Congrats
Route::get('/change_status_video_congrats/{click_id}', 'AdminController@change_status_video_congrats');
Route::get('/get_data_video_congrats_all', 'AdminController@get_data_video_congrats_all');
Route::get('/get_rank_type_video_congrats', 'AdminController@get_rank_type_video_congrats');
Route::get('/get_video_congrats/{user_id}', 'AdminController@get_video_congrats');
Route::get('/skip_video_congrats/{user_id}/{skip_video_congrats}', 'AdminController@skip_video_congrats');
Route::get('/update_countTime_video_congrats/{user_id}/{countTime}', 'AdminController@update_countTime_video_congrats');
Route::get('/update_check_video_congratulation/{user_id}/{skip_video_congrats}', 'AdminController@update_check_video_congratulation');
Route::get('/reset_check_video_congrats/{type}', 'AdminController@reset_check_video_congrats');

// Content Popup
Route::get('/reset_check_content_popup', 'AdminController@reset_check_content_popup');
Route::get('/get_data_content_popup', 'AdminController@get_data_content_popup');
Route::get('/theme_user_get_content_popup', 'Content_popupsController@theme_user_get_content_popup');
Route::get('/skip_content_popup/{user_id}/{skip_content_popup}', 'AdminController@skip_content_popup');
Route::get('/change_status_content_popup/{click_id}', 'AdminController@change_status_content_popup');
Route::get('/update_countTime_content_popup/{user_id}/{countTime}', 'AdminController@update_countTime_content_popup');


// Calendar
Route::get('/get_data_for_calendar', 'AdminController@get_data_for_calendar');

