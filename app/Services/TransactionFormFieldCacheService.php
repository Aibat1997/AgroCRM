<?php

namespace App\Services;

use App\Models\TransactionFormField;
use App\Models\TransactionType;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;

final class TransactionFormFieldCacheService
{
    private const CACHE_KEY = 'transaction_form_fields_all';
    private const CACHE_KEY_BY_TYPE_ID = 'transaction_form_fields_by_type_id';
    private const CACHE_TTL = 3600 * 24 * 14; // 14 days

    public function getTransactionFormFields(): Collection
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            $transactionType = TransactionType::with('formFields')->get();
            return $transactionType->flatMap(function ($type) {
                return $type->formFields;
            })->keyBy('id');
        });
    }

    public function getTransactionFormFieldsByTypeId(): Collection
    {
        return Cache::remember(self::CACHE_KEY_BY_TYPE_ID, self::CACHE_TTL, function () {
            return $this->getTransactionFormFields()->groupBy(function ($item) {
                return $item->pivot->transaction_type_id;
            });
        });
    }

    public function getTransactionFormFieldById(int $id): ?TransactionFormField
    {
        return $this->getTransactionFormFields()->get($id);
    }

    public function getTransactionFormFieldByTypeId(int $typeId): ?Collection
    {
        return $this->getTransactionFormFieldsByTypeId()->get($typeId, collect());
    }

    public function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
        Cache::forget(self::CACHE_KEY_BY_TYPE_ID);
    }

    public function warmupCache(): void
    {
        $this->getTransactionFormFields();
        $this->getTransactionFormFieldsByTypeId();
    }
}
