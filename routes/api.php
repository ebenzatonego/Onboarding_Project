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

// FHC
Route::get('/verify_account/{account}', 'AdminController@verify_account');

Route::get('/gat_data_of_notification/{user_id}', 'AdminController@gat_data_of_notification');

Route::get('/check_pdpa/{account}', 'AdminController@check_pdpa');
Route::get('/update_coc_of_user/{users_id}', 'AdminController@update_coc_of_user');
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
Route::get('/get_list_member', 'AdminController@get_list_member');
Route::get('/get_group_manager', 'AdminController@get_group_manager');
Route::get('/get_area_supervisor', 'AdminController@get_area_supervisor');
Route::post('/edit_area_super_visor', 'AdminController@edit_area_super_visor');


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
Route::post('/add_training_type', 'Training_typeController@add_training_type');
// Route::get('/add_training_type/{training_type}/{downloadURL}', 'Training_typeController@add_training_type');
Route::get('/give_rating_training/{user_id}/{training_id}/{selectedRating}', 'TrainingController@give_rating_training');
Route::get('/user_cancel_like/{user_id}/{training_id}', 'TrainingController@user_cancel_like');
Route::get('/submit_reasons_dislike/{user_id}/{training_id}/{reasons_dislike}', 'TrainingController@submit_reasons_dislike');
Route::get('/user_cancel_dislike/{user_id}/{training_id}', 'TrainingController@user_cancel_dislike');
Route::get('/user_click_fav_btn/{user_id}/{training_id}/{type}', 'TrainingController@user_click_fav_btn');
Route::get('/update_user_view/{user_id}/{training_id}', 'TrainingController@update_user_view');
Route::get('/update_countTime_trainingVideo/{user_id}/{countTime}/{training_id}', 'TrainingController@update_countTime_trainingVideo');
Route::get('/get_data_Training/{type}', 'TrainingController@get_data_Training');
Route::get('/get_data_Training_for_index/{type}', 'TrainingController@get_data_Training_for_index');
Route::get('/change_Highlight/{training_id}/{number}/{type}', 'TrainingController@change_Highlight');
Route::get('/get_data_Training_type', 'Training_typeController@get_data_Training_type');
Route::get('/get_photo_Training_type/{id}', 'Training_typeController@get_photo_Training_type');
Route::get('/change_number_menu_type/{type_id}/{number}', 'Training_typeController@change_number_menu_type');
Route::post('/update_Menu_Highlight', 'Training_typeController@update_Menu_Highlight');
Route::get('/get_count_training_highlight/{number}', 'Training_typeController@get_count_training_highlight');
Route::get('/delete_training_type/{training_type_id}', 'Training_typeController@delete_training_type');
Route::get('/get_list_number_menu_of_appointment', 'Training_typeController@get_list_number_menu_of_appointment');
Route::post('/save_data_edit_training', 'TrainingController@save_data_edit_training');


// appointment
Route::get('/get_data_appointment/{type}', 'AppointmentsController@get_data_appointment');
Route::get('/get_data_appointment_now/{training_type_id}/{month}/{year}/{type_appointment}', 'AppointmentsController@get_data_appointment_now');
Route::get('/get_data_number_menu_of_appointment/', 'Training_typeController@get_data_number_menu_of_appointment');
Route::get('/change_number_menu_of_appointment/{type_id}/{number}', 'Training_typeController@change_number_menu_of_appointment');
Route::get('/give_rating_appointment/{user_id}/{appointment_id}/{selectedRating}', 'AppointmentsController@give_rating_appointment');
Route::get('/user_cancel_like_appointment/{user_id}/{appointment_id}', 'AppointmentsController@user_cancel_like_appointment');
Route::get('/submit_reasons_dislike_appointment/{user_id}/{appointment_id}/{reasons_dislike}', 'AppointmentsController@submit_reasons_dislike_appointment');
Route::get('/user_cancel_dislike_appointment/{user_id}/{_appointmentid}', 'AppointmentsController@user_cancel_dislike_appointment');
Route::get('/user_click_fav_btn_appointment/{user_id}/{appointment_id}/{type}', 'AppointmentsController@user_click_fav_btn_appointment');
Route::get('/update_user_view_appointment/{user_id}/{appointment_id}', 'AppointmentsController@update_user_view_appointment');
Route::get('/get_list_quiz_area', 'AppointmentsController@get_list_quiz_area');
Route::get('/get_data_appointment_now_quiz/{month}/{year}/{area_id}', 'AppointmentsController@get_data_appointment_now_quiz');
Route::post('/save_data_edit_appointment', 'AppointmentsController@save_data_edit_appointment');


// activity
Route::get('/update_user_view_activity/{user_id}/{activity_id}', 'ActivitysController@update_user_view_activity');
Route::get('/get_data_activitys/{activity_type_id}', 'ActivitysController@get_data_activitys');
Route::get('/give_rating_activity/{user_id}/{activity_id}/{selectedRating}', 'ActivitysController@give_rating_activity');
Route::get('/user_cancel_like_activity/{user_id}/{activity_id}', 'ActivitysController@user_cancel_like_activity');
Route::get('/submit_reasons_dislike_activity/{user_id}/{activity_id}/{reasons_dislike}', 'ActivitysController@submit_reasons_dislike_activity');
Route::get('/user_cancel_dislike_activity/{user_id}/{activity_id}', 'ActivitysController@user_cancel_dislike_activity');
Route::get('/user_click_fav_btn_activity/{user_id}/{activity_id}/{type}', 'ActivitysController@user_click_fav_btn_activity');
Route::get('/get_data_activity_type', 'Activity_typesController@get_data_activity_type');
Route::get('/get_data_activity_admin/{type}', 'ActivitysController@get_data_activity_admin');
Route::get('/update_countTime_activityVideo/{user_id}/{countTime}/{activity_id}', 'ActivitysController@update_countTime_activityVideo');
Route::get('/get_data_number_menu_of_activitys/', 'Activity_typesController@get_data_number_menu_of_activitys');
Route::get('/change_number_menu_of_activitys/{type_id}/{number}', 'Activity_typesController@change_number_menu_of_activitys');
Route::get('/delete_activitys_type/{activitys_type_id}', 'Activity_typesController@delete_activitys_type');
Route::get('/change_Highlight_activity/{activity_id}/{number}/{type}', 'ActivitysController@change_Highlight_activity');
Route::post('/save_data_edit_activity', 'ActivitysController@save_data_edit_activity');


// News
Route::get('/get_data_news/{news_type_id}', 'NewsController@get_data_news');
Route::get('/update_user_view_news/{user_id}/{news_id}', 'NewsController@update_user_view_news');
Route::get('/give_rating_news/{user_id}/{news_id}/{selectedRating}', 'NewsController@give_rating_news');
Route::get('/user_cancel_like_news/{user_id}/{news_id}', 'NewsController@user_cancel_like_news');
Route::get('/user_cancel_dislike_news/{user_id}/{news_id}', 'NewsController@user_cancel_dislike_news');
Route::get('/submit_reasons_dislike_news/{user_id}/{news_id}/{reasons_dislike}', 'NewsController@submit_reasons_dislike_news');
Route::get('/user_click_fav_btn_news/{user_id}/{news_id}/{type}', 'NewsController@user_click_fav_btn_news');
Route::get('/update_countTime_newsVideo/{user_id}/{countTime}/{news_id}', 'NewsController@update_countTime_newsVideo');
Route::get('/get_data_News_type', 'News_typesController@get_data_News_type');
Route::get('/get_data_news_admin/{type}', 'NewsController@get_data_news_admin');
Route::get('/get_data_number_menu_of_news/', 'News_typesController@get_data_number_menu_of_news');
Route::get('/change_Highlight_news/{news_id}/{number}/{type}', 'NewsController@change_Highlight_news');
Route::get('/change_number_menu_type_news/{type_id}/{number}', 'News_typesController@change_number_menu_type_news');
Route::get('/delete_news_type/{news_type_id}', 'News_typesController@delete_news_type');
Route::post('/save_data_edit_news', 'NewsController@save_data_edit_news');


// Product
Route::post('/add_product_type', 'Product_typesController@add_product_type');
Route::get('/get_data_product/{product_type_id}', 'ProductsController@get_data_product');
Route::get('/get_data_type_product', 'Product_typesController@get_data_type_product');
Route::get('/update_user_view_product/{user_id}/{product_id}', 'ProductsController@update_user_view_product');
Route::get('/give_rating_product/{user_id}/{product_id}/{selectedRating}', 'ProductsController@give_rating_product');
Route::get('/user_cancel_like_product/{user_id}/{product_id}', 'ProductsController@user_cancel_like_product');
Route::get('/user_cancel_dislike_product/{user_id}/{product_id}', 'ProductsController@user_cancel_dislike_product');
Route::get('/submit_reasons_dislike_product/{user_id}/{product_id}/{reasons_dislike}', 'ProductsController@submit_reasons_dislike_product');
Route::get('/user_click_fav_btn_product/{user_id}/{product_id}/{type}', 'ProductsController@user_click_fav_btn_product');
Route::get('/user_click_pdf_btn/{user_id}/{product_id}', 'ProductsController@user_click_pdf_btn');
Route::get('/get_data_product_fav/{user_id}', 'ProductsController@get_data_product_fav');
Route::get('/get_data_product_type', 'Product_typesController@get_data_product_type');
Route::get('/get_data_product_admin/{type}', 'ProductsController@get_data_product_admin');
Route::get('/change_Highlight_products/{product_id}/{number}/{type}', 'ProductsController@change_Highlight_products');
Route::get('/get_data_product_type', 'Product_typesController@get_data_product_type');
Route::get('/change_number_menu_type_product/{type_id}/{number}', 'Product_typesController@change_number_menu_type_product');
Route::get('/delete_product_type/{product_type_id}', 'Product_typesController@delete_product_type');
Route::post('/save_data_edit_product', 'ProductsController@save_data_edit_product');

// Tools contact
Route::get('/get_data_show_tools_contact', 'Tools_contactsController@get_data_show_tools_contact');

// Tools App
Route::get('/get_data_tools_apps', 'Tools_appsController@get_data_tools_apps');
Route::get('/change_sort_number_tools_app/{id}/{number}', 'Tools_appsController@change_sort_number_tools_app');


// Career Paths
Route::post('/update_title_story_career_path', 'Career_pathsController@update_title_story_career_path');
Route::get('/get_data_story_career_paths', 'Career_pathsController@get_data_story_career_paths');
Route::get('/get_content_career_paths/{name_rank}/{number_story}', 'Career_path_contentsController@get_content_career_paths');
Route::get('/create_html_content_career/{id}', 'Career_path_contentsController@create_html_content_career');
Route::get('/update_user_view_career_paths_head/{user_id}/{id}', 'Career_pathsController@update_user_view_career_paths_head');
Route::get('/update_user_view_career_paths_item/{user_id}/{id}', 'Career_path_contentsController@update_user_view_career_paths_item');
Route::get('/user_download_pdf_career_path/{user_id}/{id}', 'Career_path_contentsController@user_download_pdf_career_path');
Route::get('/update_countTime_career_path/{user_id}/{countTime}/{id}', 'Career_path_contentsController@update_countTime_career_path');
Route::get('/get_data_career_path_contents/{now_rank}/{now_story}', 'Career_path_contentsController@get_data_career_path_contents');
Route::get('/change_sort_number/{id}/{number}/{type}', 'Career_path_contentsController@change_sort_number');


// Share
Route::get('/save_log_share/{user_id}/{type_table}/{type_social}/{id}', 'AdminController@save_log_share');


// Calendar
Route::get('/get_data_for_calendar', 'AdminController@get_data_for_calendar');
Route::get('/get_data_for_calendar_for_user/{user_id}', 'AdminController@get_data_for_calendar_for_user');
Route::post('/add_calendar', 'CalendarsController@add_calendar');
Route::get('/get_edit_data_calendar/{id}', 'AdminController@get_edit_data_calendar');
Route::post('/cf_edit_data_calendar', 'AdminController@cf_edit_data_calendar');
Route::get('/delete_data_calendar/{id}', 'CalendarsController@delete_data_calendar');

// My Goal
Route::post('/save_my_goal_users', 'My_goal_usersController@save_my_goal_users');
Route::get('/update_my_goal/{user_id}', 'My_goal_usersController@update_my_goal');

Route::get('/get_data_fav_of_user/{user_id}', 'FavoritesController@get_data_fav_of_user');

Route::get('/get_data_fav_of_user/', 'FavoritesController@get_data_fav_of_user');


