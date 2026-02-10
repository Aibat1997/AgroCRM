<?php

namespace App\Http\Controllers\Api;

use App\DTO\TransactionDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Transaction\TransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct(private readonly TransactionService $transactionService) {}

    public function index(Request $request)
    {
        $transactions = Transaction::with(['transactionType', 'company', 'user', 'transactionDetails'])->latest('committed_at')->paginate(15);
        return TransactionResource::collection($transactions)->additional(['success' => true]);
    }

    public function store(TransactionRequest $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $dto = TransactionDTO::fromArray($request->validated());
        $transaction = $this->transactionService->store($dto, $user);

        return $this->return_success(new TransactionResource($transaction));
    }

    public function show(Transaction $transaction)
    {
        return $this->return_success(new TransactionResource($transaction));
    }

    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $dto = TransactionDTO::fromArray($request->validated());
        $this->transactionService->update($dto, $transaction);

        return $this->return_success(new TransactionResource($transaction));
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return $this->return_success();
    }

    public function restore(Transaction $transaction)
    {
        //
    }
}
