<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;

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


Route::middleware('isGuest')->group(function() {
Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/form', [UserController::class, 'form'])->name('form');
Route::post('/form/input', [UserController::class, 'inputForm'])->name('inputForm');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login/input', [LoginController::class, 'inputLogin'])->name('inputLogin');
});


Route::middleware('isLogin', 'checkRole:user,admin')->group(function() {
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard/function', [UserController::class, 'dashboardFunction'])->name('dashboardFunction');
Route::patch('/terima/{id}', [PaymentController::class, 'terima'])->name('terima');
Route::patch('/tolak/{id}', [PaymentController::class, 'tolak'])->name('tolak');
});

Route::middleware('isLogin', 'checkRole:user')->group(function() {
    Route::post('/dashboard/pembayaran', [PaymentController::class, 'pembayaran'])->name('dashboardPembayaran');
    Route::patch('/dashboard/update/{id}', [PaymentController::class, 'update'])->name('update');
    });

Route::middleware('isLogin', 'checkRole:admin')->group(function(){
    Route::get('/dashboard/detail/{id}', [PaymentController::class, 'detail'])->name('dashboardDetail');
    Route::get('/dashboard/bukti/{id}', [PaymentController::class, 'bukti'])->name('bukti');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');