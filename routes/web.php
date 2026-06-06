<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;

// Redirect /home ke /dashboard
Route::get('/home', function () {
    return redirect('/dashboard');
})->name('home');

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('barangs', BarangController::class);
    
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
});