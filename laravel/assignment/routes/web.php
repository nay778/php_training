<?php

use App\Http\Controllers\Student\StudentController;
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

Route::get('/',[StudentController::class,'index'])->name('list');
Route::get('create-form',[StudentController::class,'createForm'])->name('create');
Route::post('student-create',[StudentController::class,'store'])->name('create.student');
Route::get('edit-form/{id}',[StudentController::class,'editForm'])->name('edit');
Route::put('/student-update/{id}',[StudentController::class,'update'])->name('update.student');
Route::get('delete/{id}',[StudentController::class,'delete'])->name('delete');