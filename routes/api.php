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
Route::post('/edit_profile', 'AdminController@edit_profile');
Route::get('/update_check_birthday/{user_id}', 'AdminController@update_check_birthday');
Route::get('/get_last_update_users', 'AdminController@get_last_update_users');
Route::post('/create_user_member/excel', 'AdminController@create_user_member');
Route::post('/create_user_upper_al/excel', 'AdminController@create_user_upper_al');
Route::post('/create_user_group_manager/excel', 'AdminController@create_user_group_manager');
Route::post('/create_user_area_supervisor/excel', 'AdminController@create_user_area_supervisor');
Route::post('/create_log_excel_users', 'AdminController@create_log_excel_users');
Route::get('/get_log_excel_users', 'AdminController@get_log_excel_users');
Route::get('/get_list_admin', 'AdminController@get_list_admin');
Route::get('/get_list_upper_al', 'AdminController@get_list_upper_al');

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
Route::get('/get_active_content_popup', 'Content_popupsController@get_active_content_popup');
Route::get('/reset_check_content_popup', 'AdminController@reset_check_content_popup');
Route::get('/get_data_content_popup', 'AdminController@get_data_content_popup');
Route::get('/theme_user_get_content_popup', 'Content_popupsController@theme_user_get_content_popup');
Route::get('/skip_content_popup/{user_id}/{skip_content_popup}', 'AdminController@skip_content_popup');
Route::get('/change_status_content_popup/{click_id}', 'AdminController@change_status_content_popup');
Route::get('/update_countTime_content_popup/{user_id}/{countTime}', 'AdminController@update_countTime_content_popup');

// training
Route::get('/add_training_type/{training_type}', 'Training_typeController@add_training_type');
Route::get('/give_rating_training/{user_id}/{training_id}/{selectedRating}', 'TrainingController@give_rating_training');
Route::get('/user_cancel_like/{user_id}/{training_id}', 'TrainingController@user_cancel_like');
Route::get('/submit_reasons_dislike/{user_id}/{training_id}/{reasons_dislike}', 'TrainingController@submit_reasons_dislike');
Route::get('/user_cancel_dislike/{user_id}/{training_id}', 'TrainingController@user_cancel_dislike');
Route::get('/user_click_fav_btn/{user_id}/{training_id}/{type}', 'TrainingController@user_click_fav_btn');
Route::get('/update_user_view/{user_id}/{training_id}', 'TrainingController@update_user_view');


// Calendar
Route::get('/get_data_for_calendar', 'AdminController@get_data_for_calendar');

