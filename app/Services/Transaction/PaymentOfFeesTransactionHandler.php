<?php

namespace App\Services\Transaction;

use App\Contracts\TransactionHandlerInterface;
use App\DTO\TransactionDTO;
use App\Models\Transaction;
use App\Models\User;

class PaymentOfFeesTransactionHandler implements TransactionHandlerInterface
{
    public function handle(TransactionDTO $dto, User $user): Transaction
    {
        $transaction = Transaction::create([
            'transaction_type_id' => $dto->transaction_type_id,
            'company_id' => $dto->company_id ?? $user->company_id,
            'user_id' => $user->id,
            'amount' => $dto->amount,
            'description' => $dto->description,
            'is_income' => false,
            'committed_at' => now(),
        ]);

        return $transaction;
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
