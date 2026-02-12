<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::with(['transactionType', 'company', 'author'])->latest('committed_at')->paginate(15);
        return TransactionResource::collection($transactions)->additional(['success' => true]);
    }

    public function show(Transaction $transaction)
    {
        return $this->return_success(new TransactionResource($transaction));
    }
}
