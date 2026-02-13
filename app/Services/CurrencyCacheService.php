<?php

namespace App\Services;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

final class CurrencyCacheService
{
    private const CACHE_KEY = 'currencies_all';
    private const CACHE_TTL = 3600 * 5; // 5 hours

    /**
     * @return Collection<int, Currency>
     */
    public function getCurrencies(): Collection
    {
        /** @var Collection<int, Currency> $currencies */
        $currencies = Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function (): Collection {
            return Currency::query()->get();
        });

        return $currencies;
    }

    public function getCurrencyById(int $id): ?Currency
    {
        return $this->getCurrencies()->firstWhere('id', $id);
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
