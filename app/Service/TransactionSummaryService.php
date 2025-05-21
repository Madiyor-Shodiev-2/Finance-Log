<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionSummaryService
{
    static public function getDaily($userId, $date = null)
    {
        $date = $date ? Carbon::parse($date)->toDateString() : date('Y-m-d');

        $result = DB::table('transactions')
            ->selectRaw("
                COALESCE(SUM(CASE WHEN type = false THEN amount ELSE 0 END), 0) AS chiqim,
                COALESCE(SUM(CASE WHEN type = true THEN amount ELSE 0 END), 0) AS kirim
            ")
            ->where('user_id', $userId)
            ->whereDate('date', $date)
            ->first();

        return $result;
    }

    static public function getWeekly($userId, $date = null)
    {
        $date = $date ? Carbon::parse($date) : Carbon::today();

        $startOfWeek = $date->copy()->startOfWeek()->toDateString();
        $endOfWeek = $date->copy()->endOfWeek()->toDateString();

        $result = DB::table('transactions')
            ->selectRaw("
                COALESCE(SUM(CASE WHEN type = false THEN amount ELSE 0 END), 0) AS chiqim,
                COALESCE(SUM(CASE WHEN type = true THEN amount ELSE 0 END), 0) AS kirim
            ")
            ->where('user_id', $userId)
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->first();

        return $result;
    }

    static public function getMonthly($userId, $date = null)
    {
        $date = $date ? Carbon::parse($date) : Carbon::today();

        $startOfMonth = $date->copy()->startOfMonth()->toDateString();
        $endOfMonth = $date->copy()->endOfMonth()->toDateString();

        $result = DB::table('transactions')
            ->selectRaw("
                COALESCE(SUM(CASE WHEN type = false THEN amount ELSE 0 END), 0) AS chiqim,
                COALESCE(SUM(CASE WHEN type = true THEN amount ELSE 0 END), 0) AS kirim
            ")
            ->where('user_id', $userId)
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->first();

        return $result;
    }
}
