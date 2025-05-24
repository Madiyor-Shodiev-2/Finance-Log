<?php

namespace App\Http\Controllers;

use App\Actions\BalanseAction;
use App\Http\Requests\StoreTransactionRequest;
use App\Service\TransactionSummaryService;
use App\Service\TransactionSummaryAll;
use App\Actions\UserBalanseAction;
use App\Http\Requests\UpdateTransactionRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Category;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $id = Auth::user()->id;
        $transactions = TransactionSummaryService::getAll($id);

        $categories = Category::all();

        return view('main.transactions.index', [
            'categories' => $categories,
            'daily'      => $transactions['daily'],
            'monthly'    => $transactions['monthly'],
            'weekly'     => $transactions['weekly']
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        
        if(!Auth::check()){
            return redirect()->back()->withErrors(['auth' => 'Пожалуйста, зарегистрируйтесь или войдите в систему, чтобы добавить транзакцию.']);
        }
        
        $id = Auth::user()->id;
        
        $data = $request->all();
        
        $data['amount'] = BalanseAction::absIfNegative($request->amount);

        $transaction = Transaction::create([
            'user_id'     => $id,
            'amount'      => $data['amount'],
            'category_id' => $data['category_id'],
            'type'        => $data['type'],
            'date'        => $data['date'] ?? now(),
        ]);

        $test = "teasdasdst";

        UserBalanseAction::execute(Auth::user(), $transaction);

        return redirect()->route('home');
    }

    public function daily()
    {
        $id = Auth::user()->id; //fix it
        $daily = TransactionSummaryAll::getDaily($id);
        $dailyBalance = TransactionSummaryService::getDaily($id);

        return view('main.transactions.daily', [
            'daily'        => $daily,
            'dailyBalance' => $dailyBalance
        ]);
    }
    public function weekly()
    {
        $id = Auth::user()->id; //fix me   
        
        $weekly = TransactionSummaryAll::getWeekly($id);
        $week = TransactionSummaryService::getWeekly($id);
    
        return view('main.transactions.week', [
            'weekly'        => $weekly,
            'weeklyBalance' => $week
        ]);
    }
    public function monthly()
    {   
        $id = Auth::user()->id; 

        $monthly = TransactionSummaryAll::getMonthly($id);
        $month = TransactionSummaryService::getMonthly($id);

        return view('main.transactions.monthly', [
            'monthly'        => $monthly,
            'monthlyBalance' => $month
        ]);
    }
}
