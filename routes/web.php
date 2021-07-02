<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SupplierController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/submit', [HomeController::class, 'submit'])->name('create');
Route::get('/hapus/{id}', [HomeController::class, 'hapus']);
Route::post('/update', [HomeController::class, 'update']);
Route::post('/getupdate', [HomeController::class, 'getupdate']);
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
