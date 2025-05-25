<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Service\TransactionSummaryService;
use App\Service\TransactionSummaryAll;
use App\Actions\UserBalanseAction;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class TransactionController extends Controller
{
    protected $userId;
    public function __construct()
    {
        $this->userId = Auth::user()->id;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = TransactionSummaryService::getAll($this->userId);

        return view('main.transactions.index', [
            'daily'        => $transactions['daily'],
            'monthly'      => $transactions['monthly'],
            'weekly'       => $transactions['weekly']
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        $data = $request->all();

        $transaction = Transaction::create([
            'user_id'     => $this->userId,
            'amount'      => $data['amount'],
            'description' => $data['description'],
            'date'        => now(),
            'type'        => $data['type'],
        ]);
        
        UserBalanseAction::execute(Auth::user(), $transaction);

        return redirect()->route('home');
    }
    public function daily()
    {
        $daily = TransactionSummaryAll::getDaily($this->userId);
        $dailyBalance = TransactionSummaryService::getDaily($this->userId);

        return view('main.transactions.daily', [
            'daily'        => $daily,
            'dailyBalance' => $dailyBalance
        ]);
    }
    public function weekly()
    {
        $weekly = TransactionSummaryAll::getWeekly($this->userId);
        $week   = TransactionSummaryService::getWeekly($this->userId);
    
        return view('main.transactions.week', [
            'weekly'        => $weekly,
            'weeklyBalance' => $week
        ]);
    }
    public function monthly()
    {   
        $monthly = TransactionSummaryAll::getMonthly($this->userId);
        $month   = TransactionSummaryService::getMonthly($this->userId);

        return view('main.transactions.monthly', [
            'monthly'        => $monthly,
            'monthlyBalance' => $month
        ]);
    }
}
