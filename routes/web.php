<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PinjamanController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return  redirect ()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('barang', BarangController::class);
    Route::resource('barangmasuk', BarangMasukController::class);
    Route::resource('barangkeluar', BarangKeluarController::class);
    Route::resource('pinjaman', PinjamanController::class);
    Route::resource('pengembalian', PengembalianController::class);
    Route::resource('laporan', LaporanController::class);


    // Route::get('laporan', [LaporanController::class, 'index'])->name('index');
    Route::post('laporan', [LaporanController::class, 'report'])->name('report');
    Route::post('print-laporan', [LaporanController::class, 'printReport'])->name('printReport');

});
