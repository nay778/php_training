<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Api\Student\StudentApiController;

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

//Route::get('/',[StudentController::class,'index'])->name('list');
//Route::get('create-form',[StudentController::class,'createForm'])->name('create');
//Route::post('student-create',[StudentController::class,'store'])->name('create.student');
//Route::get('edit-form/{id}',[StudentController::class,'editForm'])->name('edit');
//Route::put('/student-update/{id}',[StudentController::class,'update'])->name('update.student');
//Route::get('delete/{id}',[StudentController::class,'delete'])->name('delete');

//Route::get('importExportView', [StudentController::class, 'importExportView'])->name('import-view');
Route::get('export', [StudentController::class, 'export'])->name('export');
Route::get('generate-pdf', [StudentApiController::class, 'generatePDF'])->name('pdf-export');
//Route::post('import', [StudentController::class, 'import'])->name('import');

//search
//Route::get('search-view', [StudentController::class, 'searchView'])->name('search-view');
//Route::post('search', [StudentController::class, 'search'])->name('search');


//Api
Route::get('/student/list',function(){
  return view('Api.student.list');
})->name('list');


Route::get('/student/createView',function(){
  return view('Api.student.create_form');
})->name('create-view');

Route::post('/student/save',[StudentApiController::class,'store']);

Route::get('/student/importExportView',function(){
  return view('Api.student.import');
})->name('import-view');

Route::post('/student/import', [StudentApiController::class, 'import'])->name('import');

Route::get('/student/search-view', [StudentApiController::class, 'searchView'])->name('search-view');
Route::post('/student/search', [StudentApiController::class, 'search'])->name('search');

Route::get('/student/mail-view',[StudentApiController::class, 'mailView'])->name('mail-view');
Route::post('/student/mail', [StudentApiController::class, 'mail'])->name('mail');
