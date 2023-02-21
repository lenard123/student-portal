<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Faculty\ClassesController;
use App\Http\Controllers\Faculty\HomeController;
use App\Http\Controllers\Faculty\MessageController;
use Illuminate\Support\Facades\Route;

Route::view('/login', 'pages.auth.faculty-login')->withoutMiddleware('auth:faculty');
Route::post('/login', [LoginController::class, 'facultyLogin'])->withoutMiddleware('auth:faculty');

Route::get('/', HomeController::class);
Route::get('/messages', [MessageController::class, 'index']);
Route::post('/messages', [MessageController::class, 'create']);
Route::get('/classes', [ClassesController::class, 'index']);
Route::get('/classes/{course}', [ClassesController::class, 'show']);
Route::post('/classes/{course}/lesson', [ClassesController::class, 'createLesson']);
Route::get('/classes/{course}/lessons/{lesson}', [ClassesController::class, 'showLesson']);
Route::view('/change-password', 'pages.faculty.change-password');
Route::patch('/change-password', [ChangePasswordController::class, 'changeFacultyPassword']);
