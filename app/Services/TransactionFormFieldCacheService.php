<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;
use App\Models\TransactionFormField;

final class TransactionFormFieldCacheService
{
    private const CACHE_KEY = 'transaction_form_fields_all';
    private const CACHE_KEY_BY_TYPE_ID = 'transaction_form_fields_by_type_id';
    private const CACHE_TTL = 3600 * 24 * 7; // 7 days

    public function getTransactionFormFields(): Collection
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return TransactionFormField::all()->keyBy('id');
        });
    }

    public function getTransactionFormFieldsByTypeId(): Collection
    {
        return Cache::remember(self::CACHE_KEY_BY_TYPE_ID, self::CACHE_TTL, function () {
            return $this->getTransactionFormFields()->groupBy('transaction_type_id');
        });
    }

    public function getTransactionFormFieldById(int $id): ?TransactionFormField
    {
        return $this->getTransactionFormFields()->get($id);
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
