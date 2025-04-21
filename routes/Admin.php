<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Handler;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ParkingDurationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Adminc;

Route::prefix('admin')->name('admin.')->group(function(){    
    Route::middleware(['auth:admin'])->group(function(){
        Route::resource('admin.parking',ParkingController::class)->shallow();
        Route::resource('admin',AdminController::class);
        Route::get('/{admin}/driverlist',[Adminc::class,'getAllDriver'])->name('AllDriver');
        Route::view('/profile','admin.profile')->name('showProfile');
        Route::post('/logout_handler/{role}',[Handler::class,'logoutHandler'])->name('logout');
        });
});