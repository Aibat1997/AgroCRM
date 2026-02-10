<?php

namespace App\Services;

use App\Contracts\TransactionHandlerInterface;
use App\DTO\TransactionDTO;
use App\Enums\TransactionTypeId;
use App\Models\Transaction;
use App\Models\User;
use App\Services\Transaction\ObtainingCreditTransactionHandler;
use App\Services\Transaction\PaymentOfFeesTransactionHandler;
use App\Services\Transaction\ProvisionOfFinancialAssistanceTransactionHandler;
use App\Services\Transaction\ProvisionOfServicesTransactionHandler;
use App\Services\Transaction\PurchaseTransactionHandler;
use App\Services\Transaction\ReceivingFinancialAssistanceTransactionHandler;
use App\Services\Transaction\RepaymentOfCreditTransactionHandler;
use App\Services\Transaction\SaleTransactionHandler;
use App\Services\Transaction\TaxPaymentsTransactionHandler;

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
            TransactionTypeId::PURCHASE->value => app(PurchaseTransactionHandler::class),
            TransactionTypeId::SALE->value => app(SaleTransactionHandler::class),
            TransactionTypeId::REPAYMENT_OF_A_CREDIT_OR_LOAN->value => app(RepaymentOfCreditTransactionHandler::class),
            TransactionTypeId::OBTAINING_A_CREDIT_OR_LOAN->value => app(ObtainingCreditTransactionHandler::class),
            TransactionTypeId::PAYMENT_OF_FEES_AND_SERVICES->value => app(PaymentOfFeesTransactionHandler::class),
            TransactionTypeId::PROVISION_OF_SERVICES->value => app(ProvisionOfServicesTransactionHandler::class),
            TransactionTypeId::PROVISION_OF_FINANCIAL_ASSISTANCE->value => app(ProvisionOfFinancialAssistanceTransactionHandler::class),
            TransactionTypeId::RECEIVING_FINANCIAL_ASSISTANCE->value => app(ReceivingFinancialAssistanceTransactionHandler::class),
            TransactionTypeId::TAX_PAYMENTS->value => app(TaxPaymentsTransactionHandler::class),
            default => throw new \InvalidArgumentException("Unsupported transaction type ID: $transactionTypeId"),
        };
    }
}
