<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Student\StudentApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([],function ()
{
    Route::get('/studentList',[StudentApiController::class,'index']);
    Route::get('/student/create',[StudentApiController::class,'createForm']);
    //Route::post('/student/save',[StudentApiController::class,'store']);
    Route::get('/student/edit/{id}',[StudentApiController::class,'editForm']);
    Route::put('/student/update/{id}',[StudentApiController::class,'update']);
    Route::delete('/student/delete/{id}',[StudentApiController::class,'delete']);
    Route::post('/student/search', [StudentApiController::class, 'search']);
});
