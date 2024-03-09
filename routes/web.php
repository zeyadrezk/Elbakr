<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::view('/', 'mid.home')->name('user.home');
Route::get('/user/home', [\App\Http\Controllers\mid\HomeController::class, 'index'])->name('user.home');
Route::get('/', [\App\Http\Controllers\mid\HomeController::class, 'index'])->name('user.home');


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']

], function () {
    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
        'controller' => \App\Http\Controllers\mid\UserController::class,
//        'middleware' =>'guest'
    ], function () {
        route::middleware('guest')->group(function () {
            //register
            Route::view('/register', 'mid.user.register')->name('register.form');
            route::post('/register', 'register')->name('register');
            route::get('/send/otp', 'sendOtp')->name('send.otp');
            route::post('check/otp', 'checkotp')->name('check.otp');
            route::post('complete/register', 'completeRegister')->name('complete.register');

            //login
            route::view('/login', 'mid.user.login')->name('login.form');
            route::post('/login', 'login')->name('login');
        });
        //forget password
        route::view('/forget/password', 'mid.user.forget_password')->name('forget.password');
        route::get('/send/otp/forgetPassword', 'sendOtpPassword')->name('send.otp.password');
        route::post('/check/otp/forgetPassword', 'checkOtpPassword')->name('check.otp.password');
        route::post('/resetPassword', 'resetPassword')->name('reset.password');

    });

    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
        'controller' => \App\Http\Controllers\mid\ProfileController::class,
        'middleware' => 'auth',
    ],function (){
        route::post('/logout', 'logout')->name('logout');
        route::get('/profile','profile')->name('profile');
        route::get('/edit/profile','editProfile')->name('edit.profile');
        route::post('/delete/account','DeleteAccount')->name('delete.account');
        route::get('/change/password','changePassword')->name('change.password');
        route::post('/update/password','updatePassword')->name('update.password');
        route::get('/favourite','favourite')->name('favourite');

    });
    //static page routes
    route::view('/who_are_we', 'mid.who_are_we')->name('who_are_we');


    Route::group([
        'prefix' => 'product',
        'as' => 'product.',
        'controller' => \App\Http\Controllers\mid\ProductController::class,
//     'middleware' => 'auth'
    ], function () {
        Route::get('/category/{id?}', 'productByCategory')->name('by.category');
    });

    Route::group([
        'prefix' => 'ask/price',
        'as' => 'ask.price.',
        'controller' => \App\Http\Controllers\mid\AskPriceController::class,
//     'middleware' => 'auth'
    ], function () {
        Route::post('/', 'create')->name('create');
    });


    Route::get('/project/{id}', [\App\Http\Controllers\mid\ProjectController::class,
        'index'])->name('project.index');


    Route::get('/project/Duct/work', [\App\Http\Controllers\mid\OurWorkController::class,
        'DuctWork'])->name('project.work.duct');
    Route::get('/project/repair/work', [\App\Http\Controllers\mid\OurWorkController::class,
        'repairWork'])->name('project.work.repair');




});

