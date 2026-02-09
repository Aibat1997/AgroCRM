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
            TransactionTypeId::PURCHASE->value => new PurchaseTransactionHandler(),
            TransactionTypeId::SALE->value => new SaleTransactionHandler(),
            TransactionTypeId::REPAYMENT_OF_A_CREDIT_OR_LOAN->value => new RepaymentOfCreditTransactionHandler(),
            TransactionTypeId::OBTAINING_A_CREDIT_OR_LOAN->value => new ObtainingCreditTransactionHandler(),
            TransactionTypeId::PAYMENT_OF_FEES_AND_SERVICES->value => new PaymentOfFeesTransactionHandler(),
            TransactionTypeId::PROVISION_OF_SERVICES->value => new ProvisionOfServicesTransactionHandler(),
            TransactionTypeId::PROVISION_OF_FINANCIAL_ASSISTANCE->value => new ProvisionOfFinancialAssistanceTransactionHandler(),
            TransactionTypeId::RECEIVING_FINANCIAL_ASSISTANCE->value => new ReceivingFinancialAssistanceTransactionHandler(),
            TransactionTypeId::TAX_PAYMENTS->value => new TaxPaymentsTransactionHandler(),
        };
    }
}
