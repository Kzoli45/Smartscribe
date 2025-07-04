<?php

use App\Http\Controllers\ExploreController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/settings', [SettingsController::class, 'show'])->name('settings.show');
    
    Route::get('/create/form', [FormController::class, 'showForm'])->name('form.show');
    Route::post('/create/form', [FormController::class, 'storeForm'])->name('form.store');

    Route::get('/explore', [ExploreController::class, 'show'])->name('explore.show');
    Route::get('/explore/forms/{form}', [ExploreController::class, 'showForm'])->name('explore.form.show');
    Route::post('/explore/forms/{form}/check', [ExploreController::class, 'checkForm'])->name('explore.form.check');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
