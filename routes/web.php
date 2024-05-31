<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// -- ROLE -- //
// Super-admin
// Admin
// member

Auth::routes();

// LOGIN
Route::middleware(['auth',])->group(function () {

    // Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/', 'HomeController@index');

    // Route::get('/home', function () {
    //     return view('profile/view_profile');
    // });

    // Route::get('/', function () {
    //     return view('profile/view_profile');
    // });

    Route::get('/', 'ProfileController@view_profile');
    Route::get('/home', 'ProfileController@view_profile');
    Route::get('/404', 'ProfileController@view_profile');

    Route::get('/test_crop_profile', function () {
        return view('profile.test_crop_profile');
    });

    Route::get('/video_instruction', function () {
        return view('video_instruction');
    });

    Route::get('/show_video_congrats', 'Video_congratsController@show_video_congrats');

    Route::get('/profile', function () {
        return view('profile/view_profile');
    });

    Route::get('/demo/training', function () {
        return view('demo/training/training');
    });
    Route::get('/demo/sub_training', function () {
        return view('demo/training/sub_training');
    });
    Route::get('/demo/training_show', function () {
        return view('demo/training/training_show');
    });

    Route::get('/demo/new_index', function () {
        return view('demo/new/new_index');
    });
});

// Super-admin,Admin
Route::middleware(['auth', 'role:Super-admin,Admin'])->group(function () {

    Route::get('/welcome_admin', 'HomeController@welcome_admin');
    Route::get('/calendar_admin', 'AdminController@calendar_admin');

    // Admin
    Route::get('/index_user_excel', 'AdminController@index_user_excel');
    Route::get('/list_admin', 'AdminController@list_admin');
    Route::get('/list_upper_al', 'AdminController@list_upper_al');

    // video_welcome_page
    Route::resource('video_welcome_page', 'Video_welcome_pageController');
    Route::get('/manage_video_welcome_page', 'Video_welcome_pageController@manage_video_welcome_page');
    Route::get('/create_video_welcome_page', 'Video_welcome_pageController@create_video_welcome_page');
    Route::get('/view_video_intro/{id}', 'Video_welcome_pageController@view_video_intro');

    // video_congrats
    Route::resource('video_congrats', 'Video_congratsController');
    Route::resource('video_congrats_type_ranks', 'Video_congrats_type_ranksController');
    Route::get('/manage_video_congrats', 'Video_congratsController@manage_video_congrats');
    Route::get('/create_video_congrats', 'Video_congratsController@create_video_congrats');
    Route::get('/view_video_congrats/{id}', 'Video_congratsController@view_video_congrats');

    // content_popups
    Route::resource('content_popups', 'Content_popupsController');
    Route::get('/manage_content_popups', 'Content_popupsController@manage_content_popups');
    Route::get('/create_content_popups', 'Content_popupsController@create_content_popups');
    Route::get('/view_content_popup/{id}', 'Content_popupsController@view_content_popup');

    // training
    Route::resource('training', 'TrainingController');
    Route::get('/training_create/{type}', 'TrainingController@create');
    Route::resource('news', 'NewsController');

});

// member
Route::middleware(['auth', 'role:Super-admin,Admin,member'])->group(function () {

    // News
    Route::get('/news_index', 'NewsController@index');

});

// Route::resource('training_type', 'Training_typeController');

Route::resource('calendars', 'CalendarsController');
Route::resource('favorites', 'FavoritesController');
Route::resource('log_video_trainings', 'Log_video_trainingsController');
Route::resource('log_video_news', 'Log_video_newsController');
Route::resource('log_video_tools_tutorials', 'Log_video_tools_tutorialsController');
Route::resource('logs', 'LogsController');
Route::resource('appointments', 'AppointmentsController');
Route::resource('tools_apps', 'Tools_appsController');
Route::resource('tools_contacts', 'Tools_contactsController');
Route::resource('tools_tutorials', 'Tools_tutorialsController');
Route::resource('news_types', 'News_typesController');
Route::resource('activitys', 'ActivitysController');
Route::resource('activity_types', 'Activity_typesController');
Route::resource('product_types', 'Product_typesController');
Route::resource('products', 'ProductsController');
Route::resource('notis', 'NotisController');
Route::resource('appointment_areas', 'Appointment_areasController');
Route::resource('career_paths', 'Career_pathsController');
Route::resource('career_path_contents', 'Career_path_contentsController');
Route::resource('my_goal_users', 'My_goal_usersController');
Route::resource('my_goal_types', 'My_goal_typesController');
Route::resource('contact_area_supervisors', 'Contact_area_supervisorsController');
Route::resource('contact_group_managers', 'Contact_group_managersController');
Route::resource('contact_upper_als', 'Contact_upper_alsController');

Route::resource('log_excel_users', 'Log_excel_usersController');