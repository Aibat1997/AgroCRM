<?php

namespace App\Services\Transaction;

use App\Enums\TransactionStatus;
use App\Enums\TransactionTypeId;
use App\Models\Debt;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoanProvisionHandler
{
    public function handle(Debt $debt, User $user): Transaction
    {
        return DB::transaction(function () use ($debt, $user): Transaction {
            $company = $debt->company;

            $transaction = $company->transactions()->create([
                'transaction_type_id' => TransactionTypeId::LOAN_PROVISION->value,
                'author_id' => $user->id,
                'amount' => $debt->amount,
                'description' => "Предоставление займа клиенту {$debt->client->name} на сумму {$debt->amount}",
                'is_income' => false,
                'status' => TransactionStatus::COMPLETED,
                'committed_at' => now(),
            ]);

            $company->balance()->decrement('balance', $debt->amount);
            $debt->transactionable()->create(['transaction_id' => $transaction->id]);

            return $transaction;
        });
    }
}
