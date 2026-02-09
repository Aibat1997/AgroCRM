<?php

namespace App\Http\Controllers\Api;

use App\DTO\TransactionDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Transaction\TransactionRequest;
use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct(private readonly TransactionService $transactionService) {}

    public function index(Request $request)
    {
        //
    }

    public function store(TransactionRequest $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $dto = TransactionDTO::fromArray($request->validated());
        $transaction = $this->transactionService->store($dto, $user);

        return response()->json($transaction, 201);
    }

    public function show(Transaction $transaction)
    {
        //
    }

    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $dto = TransactionDTO::fromArray($request->validated());
        $this->transactionService->update($dto, $transaction);

        return response()->json($transaction, 200);
    }

    public function destroy(Transaction $transaction)
    {
        //
    }

    public function restore(Transaction $transaction)
    {
        //
    }
}
