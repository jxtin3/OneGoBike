<?php

use App\Http\Controllers\Admin\LocationController;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;

Route::middleware([EnsureAdmin::class])->group(function () {
    Route::get('/locations', [LocationController::class, 'index'])->name('api.locations.index');
    Route::post('/locations', [LocationController::class, 'store'])->name('api.locations.store');
});

Route::middleware('auth')->prefix('gobiker')->group(function () {
    Route::post('/location', [LocationController::class, 'updateLocation'])->name('api.gobiker.location');
    Route::post('/active/start', [LocationController::class, 'startActiveSession'])->name('api.gobiker.active.start');
    Route::post('/active/stop', [LocationController::class, 'stopActiveSession'])->name('api.gobiker.active.stop');
});
