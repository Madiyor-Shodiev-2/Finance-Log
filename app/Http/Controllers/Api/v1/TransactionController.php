<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Actions\UserBalanseAction;
class TransactionController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Transaction::all()
        ]);
    }

    public function store(StoreTransactionRequest $request)
    {
        $id = Auth::user()->id;

        $data = $request->all();

        $transaction = Transaction::create([
            'user_id'     => $id,
            'amount'      => $data['amount'],
            'description' => $data['description'],
            'type'        => $data['type'],
            'date'        => now()
        ]);

        UserBalanseAction::execute(Auth::user(), $transaction);

        return response()->json([
            'data' => $transaction->load('user')
        ], 201);
    }
}
