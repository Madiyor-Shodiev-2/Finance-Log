<?php

use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\TransactionController; 
use Illuminate\Support\Facades\Route; 
use App\Http\Middleware\AuthRedirect;
use App\Http\Middleware\SetLocale;


Route::get('/', function () {
    $locale = config('app.fallback_locale');

    return redirect("/{$locale}");
});

Route::prefix('{locale}')
->where(['locale' => 'en|ru'])
->middleware(SetLocale::class)
->group(function () {

    Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
    
    Route::middleware(AuthRedirect::class)->group(function () {
        Route::get('/finance-log/dashboard', [HomeController::class, 'index'])->name('home');
        Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
        Route::get('/transactions/daily', [TransactionController::class, 'daily'])
        ->name('transactions.daily');
        Route::get('/transactions/weekly', [TransactionController::class, 'weekly'])
        ->name('transactions.weekly');
        Route::get('/transactions/monthly', [TransactionController::class, 'monthly'])
        ->name('transactions.monthly');
    });

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
    ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
    ->name('profile.destroy');
});

require __DIR__.'/auth.php';
