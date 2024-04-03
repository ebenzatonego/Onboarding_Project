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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/video_instruction', function () {
    return view('video_instruction');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// LOGIN
Route::middleware(['auth',])->group(function () {

});

// LOGIN
Route::middleware(['auth', 'role:Super-admin,Admin'])->group(function () {

    Route::get('/welcome_admin', 'HomeController@welcome_admin');

});