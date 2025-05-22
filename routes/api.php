<?php

use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\TransactionController;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::post('/tokens/create', function (Request $request) {
    $user = User::find($request->user_id);
    
    $token = $user->createToken($user->name);

    return response()->json([
        'token' => $token->plainTextToken,
        'user' => $user
    ], 201);
});

Route::prefix('v1')->group(function () {

    Route::get('/users', [UserController::class, 'index'])
    ->name('api.users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('api.users.show');
    Route::post('/users', [UserController::class, 'store'])
    ->name('api.users.store');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->name('api.useres.delete');
    Route::put('/users/{user}', [UserController::class, 'update'])
    ->name('api.users.update');

    Route::get('/categories', [CategoryController::class, 'index'])
    ->name('api.categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])
    ->name('api.categories.store');

    Route::get('/transactions', [TransactionController::class, 'index'])
    ->name('api.transactions.index');
    Route::post('/transactions', [TransactionController::class, 'store'])
    ->middleware('auth:sanctum')
    ->name('api.transactions.store');
});