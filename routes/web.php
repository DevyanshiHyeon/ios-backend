<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Models\Advertisement;


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

Route::get('/',[MainController::class,'index']);
Route::post('/login',[AuthController::class,'login']);
Route::get('getotp',[AuthController::class,'getotp']);
Route::post('verifyOtp',[AuthController::class,'verifyOtp']);
Route::get('resend-otp',[AuthController::class,'resend_otp']);
Route::get('/logout',[AuthController::class,'logout']);

Route::get('apps',[AppController::class,'index']);
Route::any('appList',[AppController::class,'appList']);
Route::get('apps/create',[AppController::class,'create']);
Route::post('apps/store',[AppController::class,'store']);
Route::get('apps/edit/{app_id}',[AppController::class,'edit']);
Route::post('apps/update/{app_id}',[AppController::class,'update']);

Route::post('data/update/{app_id}',[AppController::class,'updateData']);
Route::post('/upload-appIcon/{app_id}', [AppController::class, 'uploadAppIcon']);
Route::post('upload-appImage/{app_id}',[AppController::class,'uploadAppImage']);

Route::post('save-facebook-data/{app_id}',[AdvertisementController::class,'saveFacebookData']);
Route::post('save-google-data/{app_id}',[AdvertisementController::class,'saveGoogleData']);
Route::post('save-myAds-data/{app_id}',[AdvertisementController::class,'saveMyAdsData']);
Route::any('update-app-list-Myads/{app_id}',[AdvertisementController::class,'updateAppListMyads']);
Route::any('change-add-status/{app_id}',[AdvertisementController::class,'changeAddStatus']);