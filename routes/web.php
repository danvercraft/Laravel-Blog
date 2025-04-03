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

    Route::resource('finance_categories', FinanceCategoryController::class)
        ->names([
            'index' => 'finance-categories.index',
            'create' => 'finance-categories.create',
            'store' => 'finance-categories.store',
            'show' => 'finance-categories.show',
            'edit' => 'finance-categories.edit',
            'update' => 'finance-categories.update',
            'destroy' => 'finance-categories.destroy',
        ]);

        
}); 

require __DIR__.'/auth.php';
