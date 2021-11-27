<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ClassRoomController;
use App\Http\Controllers\Admin\SchoolYearController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TestTypeController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('test-dashboard-admin', 'admin.dashboard');
Route::view('test-login-admin', 'admin.login');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('login', [AdminAuthController::class, 'loginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);

    Route::middleware('auth')->group(function() {
        Route::view('/', 'admin.dashboard')->name('dashboard');

        Route::resource('school-years', SchoolYearController::class)->except('show');
        Route::resource('students', StudentController::class)->except('show');
        Route::resource('class-rooms', ClassRoomController::class)->except('show');
        Route::resource('test-types', TestTypeController::class)->except('show');
        Route::resource('subjects', SubjectController::class)->except('show');
        Route::resource('teachers', TeacherController::class)->except('show');
    });
});
