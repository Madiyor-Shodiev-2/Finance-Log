<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\TransactionSummaryService;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
class HomeController extends Controller
{
    //Bu yerda sizning saytingizning bosh qismi uchun controller
    public function index()
    {
        //O'ylil transaktsiyalarni olish uchun TransactionService dan foydalanamiz
        $monthlyTransactions = TransactionSummaryService::getMonthly(Auth::user()->id);

        //Faqat ozgacha kategoriylarni transaksiyatan sug'urib olish uchun
        $categories = Transaction::where('user_id', Auth::user()->id)
            ->with('category')
            ->get()
            ->pluck('category')
            ->unique('id')
            ->values();

        //Kategoriyalarni yuborvolishy uchun Foydanlanuvchini tranzaksiyasi dan foydalanamiz
        $transactions = Transaction::where('user_id', Auth::user()->id)
            ->with('category')
            ->orderBy('date', 'desc')
            ->get();

        //Bu yerda sizning saytingizning dashboard qismini ko'rsatiladi
        return view('main.home', [
            'monthlyTransactions' => $monthlyTransactions,
            'categories' => $categories,
            'transactions' => $transactions,
        ]);
    }
    //Bu yerda sizning saytingizning kirish qismi uchun controller
    public function welcome()
    {
        //Bu yerda sizning saytingizning bosh sahifasi ko'rsatiladi
        return view('main.index');
    }
}
