<?php

namespace App\Services\Transaction;

use App\Enums\TransactionStatus;
use App\Enums\TransactionTypeId;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class SaleHandler
{
    public function handle(Order $order): Transaction
    {
        return DB::transaction(function () use ($order): Transaction {
            $company = $order->company;
            $companyBalance = $company->balance;

            $transaction = Transaction::create([
                'transaction_type_id' => TransactionTypeId::SALE->value,
                'company_id' => $company->id,
                'author_id' => $order->author_id,
                'amount' => $order->total_amount,
                'description' => "Продажа товаров по заказу №{$order->id}",
                'is_income' => true,
                'status' => TransactionStatus::COMPLETED,
                'committed_at' => now(),
            ]);

            $companyBalance->increment('balance', $order->total_amount);
            $order->transactionable()->create(['transaction_id' => $transaction->id]);

            return $transaction;
        });
    }
}
