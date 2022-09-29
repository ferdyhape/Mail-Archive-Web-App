<?php

use App\Http\Controllers\DataTablesController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\SuratController;
use App\Models\surat;
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

Route::resource('/surat', SuratController::class);
Route::get('/surat-download/{id}', [SuratController::class, 'downloadPDF']);
Route::get('/cek', [DataTablesController::class, 'index']);

Route::get('/about', function () {
    return view('dashboard.about');
});
