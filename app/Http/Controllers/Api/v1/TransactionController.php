<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('category')->with('user')->latest()->get();
        return response()->json([
            'data' => $transactions
        ]);
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'category_id' => 'required|exists:categories,id',
        ]);

        $transaction = Transaction::create([
            'amount' => $validated['amount'],
            'category_id' => $validated['category_id'],
            'user_id' => 1,
            'date' => now()
        ]);

        return response()->json([
            'data' => $transaction->load('user')
        ], 201);
    }
}
