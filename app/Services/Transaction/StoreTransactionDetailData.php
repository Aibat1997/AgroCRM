<?php

namespace App\Services\Transaction;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Services\TransactionFormFieldCacheService;
use JsonException;
use RuntimeException;

class StoreTransactionDetailData
{
    public function __construct(private readonly TransactionFormFieldCacheService $cacheService) {}

    public function handleTransactionDetail(Transaction $transaction, array $additional_fields): void
    {
        $formFields = $this->cacheService->getTransactionFormFieldByTypeId($transaction->transaction_type_id);
        $transactionDetails = [];

        foreach ($additional_fields as $fieldName => $fieldValue) {
            $field = $formFields->firstWhere('field_name', $fieldName);

            if ($field) {
                $transactionDetails[] = [
                    'transaction_id' => $transaction->id,
                    'transaction_form_field_id' => $field->id,
                    'field_value' => is_array($fieldValue) ? $this->encodeFieldValue($fieldValue, (string) $fieldName) : (string) $fieldValue,
                ];
            }
        }

        if (empty($transactionDetails)) {
            return;
        }

        TransactionDetail::upsert($transactionDetails, ['transaction_id', 'transaction_form_field_id'], ['field_value']);
    }

    private function encodeFieldValue(array $fieldValue, string $fieldName): string
    {
        try {
            return json_encode($fieldValue, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            throw new RuntimeException("Failed to encode transaction field value for {$fieldName}.", 0, $exception);
        }
    }
}
