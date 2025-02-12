<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIIbankController;


//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::get('/nasabah/{cif}',[APIIbankController::class, 'viewMasterNasabah']);
Route::post('/nasabah/{cif}',[APIIbankController::class, 'UpdatePinNasabah']);
Route::get('/rekening/nasabah/{cif}',[APIIbankController::class, 'GetRekeningNasabah']);
Route::get('/rekening/pinjaman/{norek}',[APIIbankController::class, 'GetTrxPinjamanByRekening']);
Route::get('/rekening/deposito/{norek}',[APIIbankController::class, 'GetTrxDepositoByRekening']);
Route::get('/rekening/tabungan/{norek}',[APIIbankController::class, 'GetTrxTabunganByRekening']);
