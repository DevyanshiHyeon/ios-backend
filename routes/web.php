<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('apps',[AppController::class,'index']);
Route::any('appList',[AppController::class,'appList']);
Route::get('apps/create',[AppController::class,'create']);
Route::post('apps/store',[AppController::class,'store']);
Route::get('apps/edit/{app_id}',[AppController::class,'edit']);
Route::post('apps/update/{app_id}',[AppController::class,'update']);

Route::post('data/update/{app_id}',[AppController::class,'updateData']);
Route::post('/upload-appIcon/{app_id}', [AppController::class, 'uploadAppIcon']);
Route::post('upload-appImage/{app_id}',[AppController::class,'uploadAppImage']);