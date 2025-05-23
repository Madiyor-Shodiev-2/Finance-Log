<?php

namespace App\Service; // Bu faylning nomi TransactionSummaryAll.php

use App\Models\Transaction; // Transaction modelini import qilamiz
use Carbon\Carbon; // Carbon kutubxonasini import qilamiz

class TransactionSummaryAll //Bu sinf userning transaktsiyalarini filtirlab olish uchun
{
    static public function getDaily($id)//Bu funksiya userning kunlik transaktsiyalarini olish uchun
    {
        $transactions = Transaction::with('category') // kategoriyasi bilan
            ->where('user_id', $id) // userni tekshiramiz
            ->whereDate('date', today()) // bugungi transaktsiyalarni oladi
            ->orderBy('date', 'desc') // oxirgi transaktsiyalarni birinchi qilib chiqaradi
            ->get(); // transaktsiyalarni olib keladi

        return $transactions; //Jonatamiz
    }

    static public function getWeekly($id)//Bu funksiya userning haftalik transaktsiyalarini olish uchun
    {

        $startOfWeek = Carbon::now()->startOfWeek(); //Haftani boshina oladi 
        $endOfWeek = Carbon::now()->endOfWeek();     //Haftani oxirini oladi
        
        $transactions = Transaction::with('category') // kategoriyasi bilan
            ->where('user_id', $id) // userni tekshiramiz
            ->whereBetween('date', [$startOfWeek, $endOfWeek]) // haftalik transaktsiyalarni oladi
            ->orderBy('date', 'desc') // oxirgi transaktsiyalarni birinchi qilib chiqaradi
            ->get(); // transaktsiyalarni olib keladi
        
        return $transactions; //Jonatamiz
    }

    static public function getMonthly($id) //Bu funksiya userning oylik transaktsiyalarini olish uchun
    {
        $transactions = Transaction::with('category') // kategoriyasi bilan
            ->where('user_id', $id) // userni tekshiramiz
            ->whereMonth('date', Carbon::now()->month) // hozirgi oydagi transaktsiyalarni opchiqai
            ->whereYear('date', Carbon::now()->year) // hpzirgi yildagi transaktsiyalarni opchiqai
            ->orderBy('date', 'desc') // oxirgi transaktsiyalarni birinchi qilib chiqaradi
            ->get(); // transaktsiyalarni olib keladi

        return $transactions; //Jonatamiz
    }
}


