<?php

namespace App\Services\Transaction;

use App\Contracts\TransactionHandlerInterface;
use App\DTO\TransactionDTO;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PurchaseTransactionHandler implements TransactionHandlerInterface
{
    public function __construct(private readonly StoreTransactionDetailData $detailService) {}

    public function handle(TransactionDTO $dto, User $user): Transaction
    {
        return DB::transaction(function () use ($dto, $user): Transaction {
            $transaction = Transaction::create([
                'transaction_type_id' => $dto->transaction_type_id,
                'company_id' => $dto->company_id ?? $user->company_id,
                'user_id' => $user->id,
                'amount' => $dto->amount,
                'description' => $dto->description,
                'is_income' => false,
                'committed_at' => now(),
            ]);

            if (!is_null($dto->additional_fields)) {
                $this->detailService->handleTransactionDetail($transaction, $dto->additional_fields);
            }

            return $transaction;
        });
    }

    public function update(TransactionDTO $dto, Transaction $transaction): Transaction
    {
        $transaction->update([
            'amount' => $dto->amount,
            'description' => $dto->description,
        ]);

        return $transaction;
    }
}
