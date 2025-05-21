<?php

use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('api.users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('api.users.show');
    Route::post('/users', [UserController::class, 'store'])->name('api.users.store');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('api.useres.delete');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('api.users.update');
});