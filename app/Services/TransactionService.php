<?php

namespace App\Services;

use App\Contracts\TransactionHandlerInterface;
use App\DTO\TransactionDTO;
use App\Enums\TransactionTypeId;
use App\Models\Transaction;
use App\Models\User;
use App\Services\Transaction\PurchaseHandler;

class TransactionService
{
    public function store(TransactionDTO $dto, User $user): Transaction
    {
        $handler = $this->resolveHandler($dto->transaction_type_id);
        return $handler->handle($dto, $user);
    }

    public function update(TransactionDTO $dto, Transaction $transaction): Transaction
    {
        $handler = $this->resolveHandler($transaction->transaction_type_id);
        return $handler->update($dto, $transaction);
    }

    private function resolveHandler(int $transactionTypeId): TransactionHandlerInterface
    {
        return match ($transactionTypeId) {
            TransactionTypeId::PURCHASE->value => app(PurchaseHandler::class),
            default => throw new \InvalidArgumentException("Unsupported transaction type ID: $transactionTypeId"),
        };
    }
}
