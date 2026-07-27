<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/news', [NewsController::class, 'index']);
Route::get('/gallery', function () {
    return view('pages.gallery');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/org-structure', function () {
    return view('pages.org-structure');
});

Route::get('/what-we-do', function () {
    return view('programs');
});

Route::redirect('/programs', '/what-we-do');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/donate', function () {
    return view('donate');
});

Route::get('/privacy-policy', function () {
    return view('pages.privacy');
});

Route::get('/terms', function () {
    return view('pages.terms');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware([EnsureAdmin::class])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
});