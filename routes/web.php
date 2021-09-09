<?php

use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SupplierController;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [LandingPageController::class, 'index']);
Route::post('/submit', [HomeController::class, 'submit'])->name('create');
Route::get('/hapus/{id}', [HomeController::class, 'hapus']);
Route::post('/update', [HomeController::class, 'update']);
Route::post('/getupdate', [HomeController::class, 'getupdate']);
Route::prefix('supplier')->name('supplier.')->group(function() {
    Route::get('/', [SupplierController::class, 'index']);
    Route::post('/submit', [SupplierController::class, 'create'])->name('create');
    Route::get('/hapus/{id}',[SupplierController::class, 'hapus']);
    Route::post('/getupdate',[SupplierController::class, 'getupdate']);
});
Route::prefix('barangkeluar')->name('barangkeluar.')->group(function() {
    Route::get('/', [BarangKeluarController::class, 'index']);
    Route::post('barangkeluar/submit', [BarangKeluarController::class, 'create'])->name('create');
});
Route::prefix('barangmasuk')->name('barangmasuk.')->group(function(){
    Route::get('/', [BarangMasukController::class, 'index']);
    Route::post('/submit', [BarangMasukController::class, 'create'])->name('create');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
