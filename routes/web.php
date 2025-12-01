<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Soal No 2b: Aplikasi bisa diakses
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');