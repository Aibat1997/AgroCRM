<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Currency;

final class CurrencyCacheService
{
    private const CACHE_KEY = 'currencies_all';
    private const CACHE_TTL = 3600 * 5; // 5 hours

    public function getCurrencies(): Collection
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return Currency::all()->keyBy('id');
        });
    }

    public function getCurrencyById(int $id): ?Currency
    {
        return $this->getCurrencies()->get($id);
    }

    public function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    public function warmupCache(): void
    {
        $this->getCurrencies();
    }
}
