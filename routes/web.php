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
// Member

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

// LOGIN
Route::middleware(['auth',])->group(function () {

    // Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/', 'HomeController@index');

    Route::get('/home', function () {
        return view('profile/view_profile');
    });

    Route::get('/', function () {
        return view('profile/view_profile');
    });

    Route::get('/video_instruction', function () {
        return view('video_instruction');
    });
    Route::get('/profile', function () {
        return view('profile/view_profile');
    });

    Route::get('/demo/training', function () {
        return view('demo/training');
    });
});

// Super-admin,Admin
Route::middleware(['auth', 'role:Super-admin,Admin'])->group(function () {

    Route::get('/welcome_admin', 'HomeController@welcome_admin');
    Route::get('/calendar_admin', 'AdminController@calendar_admin');

    // training
    Route::resource('training', 'TrainingController');
    Route::get('/training_create/{type}', 'TrainingController@create');
    Route::resource('news', 'NewsController');

});

// Super-admin,Admin , Member
Route::middleware(['auth', 'role:Super-admin,Admin,Member'])->group(function () {

    Route::get('/news_index', 'NewsController@index');

});

// Route::resource('training_type', 'Training_typeController');
