<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/registrasi', [RegisterController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    // Route::get('/');
    Route::get('/home', [UserController::class, 'index']);
    Route::get('/a', [SampahController::class, 'index']);
    Route::post('/logout', [LoginController::class, 'destroy']);
    Route::get('/tambah', [SampahController::class, 'create']);
    Route::post('/post-sampah', [SampahController::class, 'store']);
    Route::delete('/delete-sampah/{id_sampah}', [SampahController::class, 'destroy']);
    Route::get('/sampah/{id_sampah}', [UserController::class, 'create']);
    Route::post('/post-transaksi', [UserController::class, 'store']);
    Route::get('/transaksi', [UserController::class, 'transaksi']);
});
