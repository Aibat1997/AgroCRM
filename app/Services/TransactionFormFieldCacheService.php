<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
use App\Models\TransactionTypeFormField;

final class TransactionFormFieldCacheService
{
    private const CACHE_KEY_BY_TYPE_ID = 'transaction_form_fields_by_type_id';
    private const CACHE_TTL = 3600 * 24 * 14; // 14 days

    public function getTransactionFormFieldsByTypeId(): Collection
    {
        return Cache::remember(self::CACHE_KEY_BY_TYPE_ID, self::CACHE_TTL, function () {
            return TransactionTypeFormField::with('transactionFormField')
                ->orderBy('sort_num')
                ->get()
                ->groupBy('transaction_type_id')
                ->map(function (Collection $transactionTypeFormFields) {
                    return $transactionTypeFormFields->map(function ($item) {
                        $field = $item->transactionFormField;
                        $field->setAttribute('is_required', $item->is_required);
                        return $field;
                    });
                });
        });
    }

    public function getTransactionFormFieldByTypeId(int $typeId): ?Collection
    {
        return $this->getTransactionFormFieldsByTypeId()->get($typeId, collect());
    }

    public function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY_BY_TYPE_ID);
    }

    public function warmupCache(): void
    {
        $this->getTransactionFormFieldsByTypeId();
    }
}
