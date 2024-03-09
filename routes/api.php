<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),

], function () {


    Route::group([
        'controller' => \App\Http\Controllers\Api\V1\UserController::class,
    ], function () {
        route::group(['middleware'=>'guest'],function (){
            //register with the same otp used for change password
            route::post('/register', 'register');
            route::post('/complete/register', 'completeRegister');

            //login
            route::post('/login', 'login');

            //forget password with otp
            route::post('/resetPassword', 'resetPassword');
        });

        route::get('/send/otp', 'sendOtp');
        route::get('/check/otp', 'checkotp');

        //logout and delete account
        route::post('/logout', 'logout')->middleware('auth:sanctum');
        route::post('/deleteAccount', 'destroy')->middleware('auth:sanctum');

    });


    Route::group([
        'controller' => \App\Http\Controllers\Api\V1\ProfileController::class,
        'middleware'=>'auth:sanctum',
    ], function () {

        route::get('/profile', 'index');

    });













});
