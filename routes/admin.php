<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SchoolYearController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::view('/login', 'pages.auth.admin-login')->withoutMiddleware('auth:admin');
Route::post('/login', [LoginController::class, 'adminLogin'])->withoutMiddleware('auth:admin');

Route::get('/', [AnnouncementController::class, 'index']);
Route::get('/faculty', [FacultyController::class, 'index']);
Route::get('/subjects', [SubjectController::class, 'index']);
Route::get('/classes', [SectionController::class, 'index']);
Route::get('/classes/new', [SectionController::class, 'createForm']);
Route::get('/classes/{section}', [SectionController::class, 'show']);

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{student}/edit', [StudentController::class, 'editForm']);
Route::get('/students/{student}/enroll', [StudentController::class, 'enrollForm']);
Route::put('/students/{student}/enroll', [StudentController::class, 'enroll']);
Route::put('/students/{student}', [StudentController::class, 'update']);


Route::get('/announcements', [AnnouncementController::class, 'index']);
Route::get('/announcements/new', [AnnouncementController::class, 'showCreateForm']);
Route::get('/announcements/{announcement}/edit', [AnnouncementController::class, 'showEditForm']);
Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show']);
Route::put('/announcements/{announcement}', [AnnouncementController::class, 'update']);
Route::post('/announcements', [AnnouncementController::class, 'create']);

Route::get('/messages', [MessageController::class, 'index']);
Route::get('/messages/{user}', [MessageController::class, 'show']);
Route::post('/messages/{user}', [MessageController::class, 'create']);

Route::put('/classes/{section}/subjects/{course}', [SectionController::class, 'updateSubject']);
Route::post('/classes', [SectionController::class, 'create']);

Route::get('/settings/school-year', [SchoolYearController::class, 'index']);
Route::patch('/settings/active-department', [SettingsController::class, 'updateActiveDepartment']);
Route::post('/settings/school-year', [SchoolYearController::class, 'create']);
Route::patch('/settings/school-year', [SchoolYearController::class, 'updateActiveSchoolYear']);
