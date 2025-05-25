<?php

namespace App\Http\Controllers;

use App\Service\TransactionSummaryService;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
class HomeController extends Controller
{
    protected $userId;
    public function __construct()
    {
        $this->userId = Auth::check() ? Auth::user()->id : null;
    }

    public function index()
    {
        $monthlyTransactions = TransactionSummaryService::getMonthly($this->userId);

        $descriptions = Transaction::select('description')
            ->where('user_id', '=', $this->userId)
            ->get();

        $transactions = Transaction::where('user_id', '=', $this->userId)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('main.home', [
            'monthlyTransactions' => $monthlyTransactions,
            'descriptions'        => $descriptions,
            'transactions'        => $transactions,
        ]);
    }
    public function welcome()
    {
        return view('main.index');
    }
}
