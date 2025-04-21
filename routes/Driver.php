<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Handler;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParkingDurationController;
use App\Http\Controllers\DriverController;

Route::prefix('driver')->name('driver.')->group(function(){
    Route::middleware(['auth:driver'])->group(function(){
        Route::resource('driver',DriverController::class);
        Route::post('park/{idd}/parking/{idp}/parkingDuration',[ParkingDurationController::class,'parkingStart'])->name('parkingStart');
        Route::put('parkingEnd/{id}',[ParkingDurationController::class,'parkingEnd'])->name('parkingEnd');
        Route::get('/showparking/{driver}',[ParkingDurationController::class,'showparking'])->name('showparking');
        Route::get('/drivertracking/{driver}',[ParkingDurationController::class,'drivertracking'])->name('drivertracking');
        Route::view('/profile','driver.profile')->name('showProfile');
        Route::post('/logout_handler/{role}',[Handler::class,'logoutHandler'])->name('logout');
        Route::post('/checkout/{id}',[ParkingDurationController::class,'checkout'])->name('checkout');
        Route::get('/success',[ParkingDurationController::class,'success'])->name('checkout.success');
        Route::get('/cancel',[ParkingDurationController::class,'cancel'])->name('checkout.cancel');
    });
});