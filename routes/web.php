<?php

//Bu fayl, saytning barcha routerlarini o'z ichiga oladi
//Bu yerda kerakli kutubxonalar chaqiriladi

use App\Http\Controllers\HomeController; //Bu kutubxona saytning bosh qismi uchun
use App\Http\Controllers\ProfileController; //Bu kutubxona foydalanuvchilarni profili uchun
use App\Http\Controllers\TransactionController; //Bu kutubxona tranzaksiyalar uchun
use Illuminate\Support\Facades\Route; //Bu kutubxona router fasadini chaqirish uchun

//Bu router, saytni kirganizda ko'rsatadigan sahifani belgilaydi
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
//Bu router, saytni bosh qismiga otish uchun yaratilgan
Route::get('/finance-log/dashboard', [HomeController::class, 'index'])->name('home');

//Bu router, saytning barcha tranzaksiyalarini ko'rsatish uchun yaratilgan
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
//Bu router, saytga yangi tranzaksiya qo'shish uchun yaratilgan
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
//
Route::get('/transactions/show', [TransactionController::class, 'show'])
->name('transactions.show');

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
