<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/programs', function () {
    return view('programs');
});

Route::get('/privacy-policy', function () {
    return view('pages.privacy');
});

Route::get('/terms', function () {
    return view('pages.terms');
});