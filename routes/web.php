<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ClassstudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\StudentclassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentuploadController;
use App\Http\Controllers\SubjectController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeController::class)->name('home');

Route::resource('students', StudentController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('marks', MarkController::class)->except('show');
Route::resource('studentclasses',StudentclassController::class);
Route::resource('studentuploads',StudentuploadController::class);

Route::get('classstudent',[ClassstudentController::class, 'classstudent'])->name('classstudent');

Route::get('class/all/students/{id}',[ClassstudentController::class, 'class_all_student'])->name('class.allstudent');