<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\SchoolYearController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SettingsController;
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

Route::view('/admin/login', 'pages.auth.admin-login');
Route::post('/admin/login', [LoginController::class, 'adminLogin']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::view('/', 'pages.admin.dashboard');
    Route::get('/settings/school-year', [SchoolYearController::class, 'index']);
    Route::get('/faculty', [FacultyController::class, 'index']);
    Route::get('/subjects', [SubjectController::class, 'index']);
    Route::get('/classes', [SectionController::class, 'index']);
    Route::get('/classes/new', [SectionController::class, 'createForm']);
    Route::get('/classes/{section}', [SectionController::class, 'show']);
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students/{student}/edit', [StudentController::class, 'editForm']);
    Route::get('/students/{student}/enroll', [StudentController::class, 'enrollForm']);
    Route::get('/announcements', [AnnouncementController::class, 'index']);
    Route::get('/announcements/new', [AnnouncementController::class, 'showCreateForm']);
    Route::get('/announcements/{announcement}/edit', [AnnouncementController::class, 'showEditForm']);
    Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show']);

    Route::put('/announcements/{announcement}', [AnnouncementController::class, 'update']);
    Route::post('/announcements', [AnnouncementController::class, 'create']);
    Route::put('/classes/{section}/subjects/{course}', [SectionController::class, 'updateSubject']);
    Route::put('/students/{student}/enroll', [StudentController::class, 'enroll']);
    Route::put('/students/{student}', [StudentController::class, 'update']);
    Route::post('/classes', [SectionController::class, 'create']);
    Route::patch('/settings/active-department', [SettingsController::class, 'updateActiveDepartment']);
    Route::post('/settings/school-year', [SchoolYearController::class, 'create']);
    Route::patch('/settings/school-year', [SchoolYearController::class, 'updateActiveSchoolYear']);
});
