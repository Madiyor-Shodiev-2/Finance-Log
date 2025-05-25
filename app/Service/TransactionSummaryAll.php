<?php

namespace App\Service;

use App\Models\Transaction; 
use Carbon\Carbon; 

class TransactionSummaryAll 
{
    static public function getDaily($userId)
    {
        $today = Carbon::now()->toDateString();

        $transactions = Transaction::byDate($today)
            ->sortByDate('desc')
            ->get();
        
        return $transactions; 
    }

    static public function getWeekly($userId)
    {
        $startOfWeek = Carbon::now()->startOfWeek()->toDateString();
        $endOfWeek = Carbon::now()->endOfWeek()->toDateString();

        $transactions = Transaction::byBetween([$startOfWeek, $endOfWeek])
            ->sortByDate('desc')
            ->get();
        
        return $transactions; 
    }

    static public function getMonthly($userId) 
    {
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;

        $transactions = Transaction::byMonth([$month, $year])
            ->sortByDate('desc')->get();

        return $transactions; 
    }
}


