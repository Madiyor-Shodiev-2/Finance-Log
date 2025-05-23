<?php

namespace App\Http\Controllers;

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
            'daily' => $transactions['daily'],
            'monthly' => $transactions['monthly'],
            'weekly' => $transactions['weekly']
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

        //Shu yerdan balans bilan ishlash kerak

        /* Agarda Expense bo'lsa,  unda balansdan olib tashlaydi va real blansga qo'shib qo'yadi
         * Agar balans yetarli bo'lmasa, tranzaksiyani balansiga haqiqiy summa qoshib qoyadi (20-30=0)
         * balance hech qachon minus son olmaydi
         * va qolgan summani real balancga qo'shib qo'yadi (20-30=-10) -10 ni real balansga qo'shib qo'yadi
         * Agar balance 0 dan kichik bo'lsa, unda real balansga qo'shib qo'yadi
         * 
         * Agar balans yetarli bo'lsa, unda balansdan olib tashlaydi (10-10 = 0)
         *  Agar qarz bo'lsa, va qarz kategoriyaga to'lov ketmagan bo'lsa, unda balansdan ayrib tashaydi (10-10=0) 
         *  real balansdan esa (0-10=-10) (-10-10=-20)
         * */

        

        $id = Auth::user()->id;
        
        $data = $request->validate([
            'amount'      => 'required|integer',
            'type'        => 'required',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $transaction = Transaction::create([
            'amount'      => $data['amount'],
            'category_id' => $data['category_id'],
            'type'        => $data['type'],
            'user_id'     => $id,
            'date'        => $data['date'] ?? now(),
        ]);
        
        UserBalanseAction::execute(Auth::user(), $transaction);

        return redirect()->back();
    }

    public function daily()
    {
        $id = Auth::user()->id; //fix it
        $daily = TransactionSummaryAll::getDaily($id);
        $dailyBalance = TransactionSummaryService::getDaily($id);

        return view('main.transactions.daily', [
            'daily' => $daily,
            'dailyBalance' => $dailyBalance
        ]);
    }
    public function weekly()
    {
        $id = Auth::user()->id; //fix me   
        
        $weekly = TransactionSummaryAll::getWeekly($id);
        $week = TransactionSummaryService::getWeekly($id);
    
        return view('main.transactions.week', [
            'weekly' => $weekly,
            'weeklyBalance' => $week
        ]);
    }
    public function monthly()
    {   
        $id = Auth::user()->id; //fix it

        $monthly = TransactionSummaryAll::getMonthly($id);
        $month = TransactionSummaryService::getMonthly($id);

        return view('main.transactions.monthly', [
            'monthly' => $monthly,
            'monthlyBalance' => $month
        ]);
    }
}
