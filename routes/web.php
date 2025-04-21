<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Handler;
use App\Http\Controller\ParkingController;
use App\Http\Controller\AdminController;
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
    return redirect()->route("Login");
});

Route::middleware(['guest'])->group(function(){
    Route::view('/Login','page.login')->name('Login');
    Route::post('/login_handler',[Handler::class,'loginHandler'])->name('loginHandler');
    Route::view('/sign in','page.Signin')->name('Signin');
    Route::post('/signin_handler',[Handler::class,'signinHandler'])->name('signinHandler');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
