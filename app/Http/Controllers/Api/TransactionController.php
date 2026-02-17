<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Transaction\TransactionCollection;
use App\Http\Resources\Transaction\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::with(['transactionType', 'company', 'author'])->latest('committed_at')->paginate(15);
        return new TransactionCollection($transactions);
    }

    public function show(Transaction $transaction)
    {
        return new TransactionResource($transaction);
    }
}
