<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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


Route::view('/login', 'pages.auth.login')->name('login');
Route::post('/login', [LoginController::class, 'studentLogin']);

Route::view('/register', 'pages.auth.register');
Route::post('/register', RegisterController::class);

Route::group(['middleware' => 'auth'], function () {
    Route::view('/', 'pages.student.home');
    Route::view('/classes', 'pages.student.classes');
    Route::view('/messages', 'pages.student.messages');
    Route::view('/profile', 'pages.student.profile');
    Route::view('/settings', 'pages.student.settings');
});

Route::group(['prefix' => 'admin'], function () {
    Route::view('/login', 'pages.auth.admin-login');
    Route::post('/login', [LoginController::class, 'adminLogin']);

    Route::view('/', 'pages.admin.dashboard')->middleware('auth:admin');
});
