<?php

namespace App\Services\Transaction;

use App\DTO\Debt\UpdateDebtDTO;
use App\Enums\DebtStatus;
use App\Enums\TransactionStatus;
use App\Enums\TransactionTypeId;
use App\Models\Debt;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReceiptOfFundsFromBorrowerHandler
{
    public function handle(UpdateDebtDTO $dto, User $user, Debt $debt): Transaction
    {
        return DB::transaction(function () use ($dto, $user, $debt): Transaction {
            $company = $debt->company;
            $client = $debt->client;
            $companyBalance = $company->balance;
            $description = '';

            if ($dto->amount === $debt->amount) {
                $debt->update(['amount' => 0, 'status' => DebtStatus::PAID->value]);
                $companyBalance->increment('balance', $dto->amount);
                $description = "Заемщик {$client->name} полностью погасил долг №{$debt->id}";
            } elseif ($dto->paid_with_raw_materials === true) {
                $debt->update(['amount' => 0, 'status' => DebtStatus::PAID->value, 'paid_with_raw_materials' => true]);
                $description = "Заемщик {$client->name} полностью погасил долг №{$debt->id}. Погашение произведено с помощью сырья.";
            } elseif ($dto->amount < $debt->amount) {
                $debt->decrement('amount', $dto->amount);
                $companyBalance->increment('balance', $dto->amount);
                $description = "Заемщик {$client->name} частично погасил долг №{$debt->id}. Остаток долга: {$debt->amount}";
            }

            $transaction = Transaction::create([
                'transaction_type_id' => TransactionTypeId::RECEIPT_OF_FUNDS_FROM_BORROWER->value,
                'company_id' => $company->id,
                'author_id' => $user->id,
                'amount' => $dto->amount,
                'description' => $description,
                'is_income' => true,
                'status' => TransactionStatus::COMPLETED,
                'committed_at' => now(),
            ]);

            $debt->transactionable()->create(['transaction_id' => $transaction->id]);

            return $transaction;
        });
    }
}
