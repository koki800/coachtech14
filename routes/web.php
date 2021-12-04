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
//登録画面表示
Route::get('/register',function(){
  return view('register');
});
//データ登録
Route::post('/register',[ RegisterController::class,'register']);


//ログイン画面表示
Route::get('/login',[LoginController::class,'login_view']);


//ログイン画面または勤怠画面表示
Route::get('/',[LoginController::class,'login']);
Route::post('/',[LoginController::class,'stamp_view']);


//勤務開始打刻
Route::post('/work_start',[AttendanceController::class,'work_start']);
//勤務終了打刻
Route::post('/work_finish',[AttendanceController::class,'work_finish']);


//休憩開始打刻
Route::post('/rest_start',[RestController::class,'rest_start']);
//休憩終了打刻
Route::post('/rest_finish',[RestController::class,'rest_finish']);



Route::get('/date',[AtteController::class,'date']);

