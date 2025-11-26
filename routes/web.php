<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Student;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Teachercontroller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/student', [StudentController::class, 'student'])->name('student');
    Route::get('/student/create', [StudentController::class, 'create'])->name('create');
    Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::get('/student/profile/{id}', [StudentController::class, 'profile'])->name('student.profile');
    Route::put('/student/profileupdate', [StudentController::class, 'profileupdate'])->name('students.profileupdate');
    Route::put('update/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::post('/student/store', [StudentController::class, 'store'])->name('store');
    Route::Delete('delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');
    Route::get('assign/teachers/{id}', [StudentController::class, 'assignteacher'])->name('assign.teachers');

    Route::post('assign/teachers/store', [StudentController::class, 'assignteacherstore'])->name('assignteachers.store');


    // paying student feel route
    Route::get('student/fees/{id}', [StudentController::class, 'fees'])->name('student.fees');
    Route::get('pay/fees/{id}', [StudentController::class, 'pays'])->name('pay.fees');
    Route::post('fees/store', [StudentController::class, 'feesstore'])->name('fees.store');
    // paying student fees end 



    // Route::post('/student/store', [StudentController::class, 'store'])->name('store');
    Route::get('/techaer/profile/{id}', action: [Teachercontroller::class, 'profile'])->name('teacher.profile');
    Route::put('/techaer/profileupdate', action: [Teachercontroller::class, 'profileupdate'])->name('teacher.profileupdate');
    Route::get('/teacher', [Teachercontroller::class, 'index'])->name('teachers.index');
    Route::get('/teacher/create', [Teachercontroller::class, 'create'])->name('teachers.create');
    Route::post('/teacher/store', [Teachercontroller::class, 'store'])->name('teachers.store');
    Route::get('/teacher/edit/{id}', [Teachercontroller::class, 'edit'])->name('teacher.edit');
    Route::put('/teacher/update/{id}', [Teachercontroller::class, 'update'])->name('teacher.update');
    Route::Delete('teacher/delete/{id}', [Teachercontroller::class, 'destroy'])->name('teacher.delete');


    Route::resource('roles', RoleController::class);
      Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

