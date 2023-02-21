<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Student\ClassesController;
use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\Student\MessageController;
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
Route::post('/logout', LogoutController::class);

Route::view('/register', 'pages.auth.register');
Route::post('/register', RegisterController::class);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', HomeController::class);
    Route::get('/classes', ClassesController::class);
    Route::get('/messages', [MessageController::class, 'index']);
    Route::view('/change-password', 'pages.student.change-password');
    Route::patch('/change-password', [ChangePasswordController::class, 'changeStudentPassword']);
    Route::post('/messages', [MessageController::class, 'create']);
    Route::view('/profile', 'pages.student.profile');
    Route::view('/settings', 'pages.student.settings');
});
