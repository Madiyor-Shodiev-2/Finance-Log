<?php

namespace App\Service;

use App\Models\Transaction; 
use Carbon\Carbon; 

class TransactionSummaryAll 
{
    static public function getDaily($id)
    {
        $transactions = Transaction::where('user_id', $id) 
            ->whereDate('date', '=', today()) 
            ->orderBy('date', 'desc') 
            ->get(); 

        return $transactions; 
    }

    static public function getWeekly($userId)
    {
        $startOfWeek = Carbon::now()->startOfWeek();  
        $endOfWeek   = Carbon::now()->endOfWeek();     
        
        $transactions = Transaction::where('user_id', $userId) 
            ->whereBetween('date', [$startOfWeek, $endOfWeek]) 
            ->orderBy     ('date', 'desc') 
            ->get         (); 
        
        return $transactions; 
    }

    static public function getMonthly($userId) 
    {
        $transactions = Transaction::where('user_id', $userId) 
            ->whereMonth('date', Carbon::now()->month) 
            ->whereYear ('date', Carbon::now()->year) 
            ->orderBy   ('date', 'desc') 
            ->get       (); 

        return $transactions; 
    }
}


