<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtteController;


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

Route::post('/register',[AtteController::class,'register']);

Route::get('/login',function(){
  return view('login');
});

Route::get('/',[AtteController::class,'login']);

Route::post('/',[AtteController::class,'stamp']);

Route::post('/work_start',[AtteController::class,'work_start']);

Route::post('/work_finish',[AtteController::class,'work_finish']);

Route::post('/rest_start',[AtteController::class,'rest_start']);

Route::post('/rest_finish',[AtteController::class,'rest_finish']);

Route::get('/date',[AtteController::class,'date']);

