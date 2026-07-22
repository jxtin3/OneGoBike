<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;

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

Route::get('/privacy-policy', function () {
    return view('pages.privacy');
});

Route::get('/terms', function () {
    return view('pages.terms');
});