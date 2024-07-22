<?php

use App\Http\Controllers\admin\auth\loginController;
use App\Http\Controllers\admin\auth\registerController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\home\homeController;
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

Route::get('/', [loginController::class, 'index']);

// Proses login dan register
Route::prefix('/')->group(function () {
    Route::get('login', [loginController::class, 'index'])->name('login');
    Route::post('login/store', [loginController::class, 'store'])->name('login.store');
    Route::get('register', [registerController::class, 'index'])->name('register');
    Route::post('register/store', [registerController::class, 'store'])->name('register.store');
});

// Halaman yang membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('logout', [loginController::class, 'logout'])->name('logout');

    // Halaman pemilik hajat
    Route::middleware('role:1')->prefix('admin')->group(function () {
        Route::get('dashboard', [dashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('tamu', [dashboardController::class, 'tamu'])->name('admin.tamu');
        Route::delete('dashboard/tamu/{id}', [dashboardController::class, 'destroy'])->name('admin.tamu.delete');
        Route::get('daftartamu', [dashboardController::class, 'daftartamu'])->name('admin.daftartamu');
    });

    // Halaman tamu hajat
    Route::middleware('role:2')->prefix('home')->group(function () {
        Route::get('dashboard', [homeController::class, 'home'])->name('dashboard');
        Route::get('tamu', [homeController::class, 'tamu'])->name('dashboard.tamu');
        Route::get('/history-transaction', [homeController::class, 'historyTransaction'])->name('history.transaction');
        Route::get('profil', [homeController::class, 'profil'])->name('dashboard.profil');
        Route::get('pembayaran', [homeController::class, 'bayar'])->name('dashboard.bayar');
        Route::post('pembayaran/process', [homeController::class, 'processPayment'])->name('process.payment');
        Route::post('pembayaran/payment', [homeController::class, 'payment'])->name('payment');
    });
});

// Handle Midtrans notifications
Route::post('/midtrans/notification', [homeController::class, 'handleNotification'])->name('midtrans.notification');
