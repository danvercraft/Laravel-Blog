<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\FinanceCategoryController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('/finance-categories', [FinanceCategoryController::class, 'index'])->name('finance-category.index');
    Route::get('/finance_categories/create', [FinanceCategoryController::class, 'create'])->name('finance_categories.create');
    Route::post('/finance_categories', [FinanceCategoryController::class, 'store'])->name('finance_categories.store');
});

require __DIR__.'/auth.php';
