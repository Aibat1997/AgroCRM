<?php

namespace App\Contracts;

use App\DTO\TransactionDTO;
use App\Models\Transaction;
use App\Models\User;

interface TransactionHandlerInterface
{
    public function handle(TransactionDTO $dto, User $user): Transaction;
    public function update(TransactionDTO $dto, Transaction $transaction): Transaction;
}
