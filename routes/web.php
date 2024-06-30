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
// Staff
// member

Auth::routes();

// No Login
Route::get('/share_training/{id}', 'TrainingController@share_training');
Route::get('/share_appointment/{id}', 'AppointmentsController@share_appointment');
Route::get('/share_activity/{id}', 'ActivitysController@share_activity');
Route::get('/share_news/{id}', 'NewsController@share_news');
Route::get('/share_product/{id}', 'ProductsController@share_product');

Route::post('/confirm-password', 'AdminController@confirmPassword');


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

    // Route::get('/profile', function () {
    //     return view('profile/view_profile');
    // });

    Route::get('/demo/training', function () {
        return view('demo/training/training');
    });
    Route::get('/demo/sub_training', function () {
        return view('demo/training/sub_training');
    });
    Route::get('/demo/training_show', function () {
        return view('demo/training/training_show');
    });

    Route::get('/demo/news_index', function () {
        return view('demo/news/news_index');
    });
    Route::get('/demo/calendar', function () {
        return view('demo/calendar');
    });
    Route::get('/demo/news_show', function () {
        return view('demo/news/news_show');
    });

    Route::get('/demo/product_index', function () {
        return view('demo/product/product_index');
    });
    Route::get('/demo/product_show', function () {
        return view('demo/product/product_show');
    });
    Route::get('/demo/product_fav', function () {
        return view('demo/product/product_fav');
    });
    Route::get('/demo/tools', function () {
        return view('demo/tools');
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
    Route::get('/member', 'AdminController@member');
    Route::get('/group_manager', 'AdminController@group_manager');
    Route::get('/area_supervisor', 'AdminController@area_supervisor');

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
    Route::get('/manage_training', 'TrainingController@manage_training');
    Route::get('/training_create', 'TrainingController@create');
    Route::get('/preview_training/{id}', 'TrainingController@preview_training');
    
    // Appointments
    Route::resource('appointments', 'AppointmentsController');
    Route::get('/manage_appointment', 'AppointmentsController@manage_appointment');
    Route::get('/appointment_create/{type}', 'AppointmentsController@create');
    Route::get('/preview_appointment/{id}', 'AppointmentsController@preview_appointment');

    // News
    Route::resource('news', 'NewsController');
    Route::get('/manage_news', 'NewsController@manage_news');
    Route::get('/preview_news/{id}', 'NewsController@preview_news');

    // Activitys
    Route::resource('activitys', 'ActivitysController');
    Route::get('/manage_activity', 'ActivitysController@manage_activity');
    Route::get('/preview_activitys/{id}', 'ActivitysController@preview_activitys');

    // Products
    Route::resource('products', 'ProductsController');
    Route::get('/manage_products', 'ProductsController@manage_products');
    Route::get('/preview_products/{id}', 'ProductsController@preview_products');

    // Tools Contacts
    Route::resource('tools_contacts', 'Tools_contactsController');
    Route::resource('tools_apps', 'Tools_appsController');
    Route::get('/manage_tools_apps', 'Tools_appsController@manage_tools_apps');

    // Career Paths
    Route::resource('career_paths', 'Career_pathsController');
    Route::resource('career_path_contents', 'Career_path_contentsController');

    // Favorites
    Route::resource('favorites', 'FavoritesController');

});

// member & Staff
Route::middleware(['auth', 'role:Super-admin,Admin,Staff,member'])->group(function () {

    // News
    Route::get('page_news', 'NewsController@index');
    Route::get('news_show/{id}', 'NewsController@show');

    // training
    Route::get('/training_show/{id}', 'TrainingController@show');
    Route::get('/page_training', 'TrainingController@index');
    Route::get('/sub_training/{type}', 'TrainingController@sub_training');

    // Appointments
    Route::get('/show_appointment_train/{id}', 'AppointmentsController@show_appointment_train');

    // activitys
    Route::get('page_activitys', 'ActivitysController@index');
    Route::get('activitys_show/{id}', 'ActivitysController@show');

    // products
    Route::get('/page_products', 'ProductsController@index');
    Route::get('/product_show/{id}', 'ProductsController@show');
    Route::get('/page_products_fav', 'ProductsController@page_products_fav');

    // Tools
    Route::get('/tools', 'Tools_appsController@index');

    // Career Paths
    Route::get('/page_career_paths', 'Career_pathsController@index');

    // calendars
    Route::resource('calendars', 'CalendarsController');

    // Favorites
    Route::get('my_favorites', 'FavoritesController@index');

});

// Route::resource('training_type', 'Training_typeController');

Route::resource('log_video_trainings', 'Log_video_trainingsController');
Route::resource('log_video_news', 'Log_video_newsController');
Route::resource('log_video_tools_tutorials', 'Log_video_tools_tutorialsController');
Route::resource('logs', 'LogsController');
Route::resource('tools_tutorials', 'Tools_tutorialsController');
Route::resource('news_types', 'News_typesController');
Route::resource('activity_types', 'Activity_typesController');
Route::resource('product_types', 'Product_typesController');
Route::resource('notis', 'NotisController');
Route::resource('appointment_areas', 'Appointment_areasController');
Route::resource('my_goal_users', 'My_goal_usersController');
Route::resource('my_goal_types', 'My_goal_typesController');
Route::resource('contact_area_supervisors', 'Contact_area_supervisorsController');
Route::resource('contact_group_managers', 'Contact_group_managersController');
Route::resource('contact_upper_als', 'Contact_upper_alsController');

Route::resource('log_excel_users', 'Log_excel_usersController');
Route::resource('log_delete_content', 'Log_delete_contentController');