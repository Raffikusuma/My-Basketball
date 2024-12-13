<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemainController;
use App\Models\Pemain;

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


Route::controller(PemainController::class)->group(function () {
    Route::get('/basket', 'basket')->name('basket');
    Route::get('/daftar-entry', 'create')->name('info_pemain.daftar-entry');
    Route::post('/daftar-entry', 'store')->name('info_pemain.store');
    Route::get('info_pemain/{id_pemain}/edit', 'edit')->name('info_pemain.edit');
    Route::put('info_pemain/{id_pemain}', 'update')->name('info_pemain.update');
    Route::get('info_pemain/{id_pemain}/hapus', 'delete')->name('info_pemain.hapus');
    Route::delete('/info_pemain/{id_pemain}/hapus', [PemainController::class, 'destroy'])->name('info_pemain.hapus');
    Route::get('/daftar-cetak', [PemainController::class, 'cetak'])->name('daftar.cetak');;

});