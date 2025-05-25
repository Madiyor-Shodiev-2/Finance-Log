<?php

namespace App\Service;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon; 

class TransactionSummaryService 
{

    public static function getAll($userId)
    {
        return [
            'daily'   => self::getDaily($userId),
            'weekly'  => self::getWeekly($userId),
            'monthly' => self::getMonthly($userId)
        ];
        
    }
    public static function getDaily($userId, $date = null) 
    {
        $date = $date ? Carbon::parse($date)->toDateString() : date('Y-m-d'); 

        $result = Transaction::query()
                ->countByQuerys(Transaction::query())
                ->byDate($date)
                ->first(); 

        $result->date = $date;

        return $result; 
    }

    static public function getWeekly($userId, $date = null) 
    {
        $date        = $date ? Carbon::parse($date) : Carbon::today();
        $startOfWeek = $date->copy()->startOfWeek()->toDateString();
        $endOfWeek   = $date->copy()->endOfWeek()->toDateString();
        
        $result = Transaction::query()
            ->countByQuerys()
            ->byBetween([$startOfWeek, $endOfWeek])
            ->first();

        $result->start_of_week = $startOfWeek;
        $result->end_of_week   = $endOfWeek;

        return $result;
    }

    static public function getMonthly($userId, $date = null)
    {
        $date         = $date ? Carbon::parse($date) : Carbon::today();
        $startOfMonth = $date->copy()->startOfMonth()->toDateString();
        $endOfMonth   = $date->copy()->endOfMonth()->toDateString();

        $result = Transaction::query()
            ->countByQuerys()
            ->byBetween([$startOfMonth, $endOfMonth])
            ->first();

        return $result;
    }
}
