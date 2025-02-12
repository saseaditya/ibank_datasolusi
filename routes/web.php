<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IbankController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/greeting', function () {
//    return 'Hello World';
//});
//
Route::get('/cc', function() {
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});
//


Route::get('/',[LoginController::class, 'viewLogin'])->name('viewLogin');
Route::get('/proses_login',[LoginController::class, 'prosesLogin'])->name('prosesLogin');
Route::get('/proses_logout',[LoginController::class, 'prosesLogout'])->name('prosesLogout');
Route::get('/requestwhatsapp',[LoginController::class, 'RequestPINByWhatsApp'])->name('RequestPINByWhatsApp');


Route::middleware('login')->group(function(){
    Route::get('/update_pin',[LoginController::class, 'viewUpdatePin'])->name('viewUpdatePin');
    Route::get('/nasabah/{cif}',[IbankController::class, 'viewMasterNasabah'])->name('viewMasterNasabah');
    Route::post('/nasabah/{cif?}',[IbankController::class, 'UpdatePinNasabah'])->name('UpdatePinNasabah');
});
