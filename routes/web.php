<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IbankController;
use App\Http\Controllers\APIIbankController;
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
Route::get('/checkUser',[LoginController::class, 'CheckUser'])->name('CheckUser');


Route::middleware('login')->group(function(){
    // Home
    Route::get('/home',[IbankController::class, 'viewHome'])->name('viewHome');

    Route::get('/update_pin',[LoginController::class, 'viewUpdatePin'])->name('viewUpdatePin');
    Route::get('/dashboard',[IbankController::class, 'viewMasterNasabah'])->name('viewDashboard');
    Route::post('/nasabah',[IbankController::class, 'UpdatePinNasabah'])->name('UpdatePinNasabah');

    // Menu Pengajuan Kredit
    Route::get('/kredit',[IbankController::class, 'viewMasterPengajuanKredit'])->name('viewMasterPengajuanKredit');
    Route::post('/kredit',[IbankController::class, 'CreatePengajuanKredit'])->name('CreatePengajuanKredit');

    // Menu Saran & Keluhan
    Route::get('/feedback',[IbankController::class, 'viewMasterFeedback'])->name('viewMasterFeedback');
    Route::post('/feedback',[IbankController::class, 'CreateFeedback'])->name('CreateFeedback');

    // List Virtual Account
    Route::get('/va',[IbankController::class, 'viewMasterVA'])->name('viewMasterVA');

});

// Ajax
Route::get('/getTrxTabungan',[IbankController::class, 'GetTrxTabunganByRekening'])->name('GetTrxTabunganByRekening');
Route::get('/getTrxPinjaman',[IbankController::class, 'GetTrxPinjamanByRekening'])->name('GetTrxPinjamanByRekening');
Route::get('/getTrxDeposito',[IbankController::class, 'GetTrxDepositoByRekening'])->name('GetTrxDepositoByRekening');
Route::post('/checkPin',[LoginController::class, 'CheckPIN'])->name('CheckPIN');

