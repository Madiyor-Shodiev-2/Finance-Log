<?php

use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ProfileController; //Bu kutubxona foydalanuvchilarni profili uchun
use App\Http\Controllers\TransactionController; //Bu kutubxona tranzaksiyalar uchun
use Illuminate\Support\Facades\Route; //Bu kutubxona router fasadini chaqirish uchun
use App\Http\Middleware\AuthRedirect; //Bu kutubxona foydalanuvchilarni autentifikatsiya qilish uchun

//Bu router, saytni kirganizda ko'rsatadigan sahifani belgilaydi
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Route::middleware(AuthRedirect::class)->group(function () {
    //Bu router, saytni bosh qismiga otish uchun yaratilgan
    Route::get('/finance-log/dashboard', [HomeController::class, 'index'])->name('home');
    //Bu router, saytning barcha tranzaksiyalarini ko'rsatish uchun yaratilgan
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    //Bu router, saytga yangi tranzaksiya qo'shish uchun yaratilgan
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    //Bu routerlar, saytda malumot korish uchun yaratilgan
    Route::get('/transactions/daily', [TransactionController::class, 'daily'])
    ->name('transactions.daily');
    Route::get('/transactions/weekly', [TransactionController::class, 'weekly'])
    ->name('transactions.weekly');
    Route::get('/transactions/monthly', [TransactionController::class, 'monthly'])
    ->name('transactions.monthly');
});

//test comment

Route::middleware('auth')->group(function () {
    //Bu router, saytdagi foydalanuvchilarni profilini o'zgartirish saxifasiga
    //o'tish uchun yaratilgan    
    Route::get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');
    //Bu router, saytdagi foydalanuvchilarni profilini o'zgartirish uchun
    Route::patch('/profile', [ProfileController::class, 'update'])
    ->name('profile.update');
    //Bu router, saytdagi foydalanuvchilarni profilini o'chirish uchun
    Route::delete('/profile', [ProfileController::class, 'destroy'])
    ->name('profile.destroy');
});

//Bu yerda auth.php faylidan kelgan routerlar chaqiriladi
require __DIR__.'/auth.php';
