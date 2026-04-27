<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\CatererProfileController;
use App\Http\Controllers\CatererDashboardController;
use App\Http\Controllers\AuthController;

Route::get('/', [LandingPageController::class, 'index'])->name('home');

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::get('/caterer/login', [AuthController::class, 'showCatererLogin'])->name('caterer.login');
    Route::get('/caterer/register', [AuthController::class, 'showCatererRegister'])->name('caterer.register');
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/caterer/login', [AuthController::class, 'Catererlogin']);
Route::post('/caterer/register', [AuthController::class, 'Catererregister']);

// Protected routes (require auth)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [ClientDashboardController::class, 'index'])->name('client.dashboard');
    Route::get('/browse-caterers', [ClientDashboardController::class, 'browse'])->name('client.browse');
    Route::get('/caterer/dashboard', [CatererDashboardController::class, 'index'])->name('caterer.dashboard');

    // Caterer profile
    Route::get('/caterer/profile', [CatererProfileController::class, 'edit'])->name('caterer.profile');
    Route::post('/caterer/profile', [CatererProfileController::class, 'update'])->name('caterer.profile.update');
});

// Admin routes (require auth + admin role)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/caterers/{user}/approve', [AdminDashboardController::class, 'approve'])->name('admin.caterer.approve');
    Route::post('/admin/caterers/{user}/reject', [AdminDashboardController::class, 'reject'])->name('admin.caterer.reject');
});
