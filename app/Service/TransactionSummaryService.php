<?php

namespace App\Service; //Bu faylning nomi TransactionSummaryService.php

use Illuminate\Support\Facades\DB; // DB kutubxonasini import qilamiz
use Carbon\Carbon; // Carbon kutubxonasini import qilamiz

class TransactionSummaryService //Bu sinf userning umumiy qilgan xarajatlarini olish uchun
{

    public static function getAll($userId)
    {
        return [
            'daily' => self::getDaily($userId),
            'weekly' => self::getWeekly($userId),
            'monthly' => self::getMonthly($userId)
        ];
        
    }
    public static function getDaily($userId, $date = null) //Bu funksiya userning kunlik xajoratini olish uchun
    {
        $date = $date ? Carbon::parse($date)->toDateString() : date('Y-m-d'); // Agar sana berilmasa, bugungi sanani oladi

        $result = DB::table('transactions') // transactions jadvalidan ma'lumotlarni olish uchun
            ->selectRaw(" 
                COALESCE(SUM(CASE WHEN type = false THEN amount ELSE 0 END), 0) AS chiqim,
                COALESCE(SUM(CASE WHEN type = true THEN amount ELSE 0 END), 0) AS kirim
            ") // chiqim va kirim summalarini hisoblash uchun
            ->where('user_id', $userId) // userni tekshiramiz
            ->whereDate('date', $date) // berilgan sanadagi transaktsiyalarni olish uchun
            ->first(); // birinchi natijani olish uchun

        $result->date = $date; // natijaga sanani qo'shamiz
        return $result; // natijani qaytaramiz
    }

    static public function getWeekly($userId, $date = null) //Bu funksiya userning haftalik xajoratini olish uchun
    {
        $date = $date ? Carbon::parse($date) : Carbon::today();

        $startOfWeek = $date->copy()->startOfWeek()->toDateString();
        $endOfWeek   = $date->copy()->endOfWeek()->toDateString();
        
        $result = DB::table('transactions')
            ->selectRaw("
                COALESCE(SUM(CASE WHEN type = false THEN amount ELSE 0 END), 0) AS chiqim,
                COALESCE(SUM(CASE WHEN type = true THEN amount ELSE 0 END), 0) AS kirim
            ")
            ->where('user_id', $userId)
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->first();

        $result->start_of_week = $startOfWeek;
        $result->end_of_week   = $endOfWeek;

        return $result;
    }

    static public function getMonthly($userId, $date = null)
    {
        $date = $date ? Carbon::parse($date) : Carbon::today();

        $startOfMonth = $date->copy()->startOfMonth()->toDateString();
        $endOfMonth   = $date->copy()->endOfMonth()->toDateString();

        $result = DB::table('transactions')
            ->selectRaw("           
                SUM(CASE WHEN type = false THEN amount ELSE 0 END) AS chiqim,
                SUM(CASE WHEN type = true THEN amount ELSE 0 END) AS kirim
            ")
            ->where('user_id', $userId)
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->first();

        return $result;
    }
}
