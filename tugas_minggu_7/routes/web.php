<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengalamanKerjaController;

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

Route::get('/home', function () {
    return view('frontend/home');
});

Route::resource('pengalaman_kerja', PengalamanKerjaController::class);

Route::get('/dashboard', function () {
    return view('backend/pengalaman_kerja/index');
});

