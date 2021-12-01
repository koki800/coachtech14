<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;


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
Route::get('/register',function(){
  return view('register');
});
Route::post('/register',[ RegisterController::class,'register']);



Route::get('/login',[LoginController::class,'login_view']);



Route::get('/',[LoginController::class,'login']);
Route::post('/',[LoginController::class,'stamp_view']);



Route::post('/work_start',[AttendanceController::class,'work_start']);

Route::post('/work_finish',[AttendanceController::class,'work_finish']);



Route::post('/rest_start',[RestController::class,'rest_start']);

Route::post('/rest_finish',[RestController::class,'rest_finish']);



Route::get('/date',[AtteController::class,'date']);

