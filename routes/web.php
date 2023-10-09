<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterDataController;

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
    return view('/auth/login');
});

// Route::resource('/categories', MasterDataController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('categories', MasterDataController::class);
});

Route::post('categories/export-pdf', [MasterDataController::class, 'exportPDF'])->name('export-pdf');

Route::post('categories/export-excel', [MasterDataController::class, 'exportExcel'])->name('export-excel');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

