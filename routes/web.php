<?php

use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

// Homepage
// Route::get('/', function () {
//     return redirect()->route('dashboard');
// });

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// Dashboard
Route::prefix('dashboard')
    ->group(function () {
        Route::resource('users', UserController::class);
    });
//     ->middleware(['auth:sanctum', 'admin'])

// TODO: Masukkan Ke Konfigurasi VTWEB Atau SnapJS
// Midtrans 
Route::get('midtrans/success', [MidtransController::class, 'success']);
Route::get('midtrans/unfinished', [MidtransController::class, 'unfinished']);
Route::get('midtrans/error', [MidtransController::class, 'error']);
