<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Service\TransactionSummaryService;
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

        $daily = TransactionSummaryService::getDaily($id);
        $month = TransactionSummaryService::getMonthly($id);
        $week = TransactionSummaryService::getWeekly($id);


        $categories = Category::all();

        return view('main.transactions.index', [
            'categories' => $categories,
            'daily' => $daily,
            'monthly' => $month,
            'weekly' => $week
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        $id = Auth::user()->id;
        
        $data = $request->validate([
            'amount' => 'required',
            'type' => 'required',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        Transaction::create([
            'amount' => $data['amount'],
            'category_id' => $data['category_id'],
            'type' => $data['type'],
            'user_id' => $id,
            'date' => $data['date'] ?? now(),
        ]);


        return redirect()->back();
    }
}
