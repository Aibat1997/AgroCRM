<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Models\Currency;

abstract class CacheService
{
    public static function getCurrencies(): array
    {
        return Cache::rememberForever('currencies_all', function () {
            return Currency::all()->keyBy('id')->toArray();
        });
    }

    public static function getCurrencyById(int $id): ?array
    {
        $currency = self::getCurrencies();
        return $currency[$id] ?? null;
    }

    public static function clearCache(): void
    {
        Cache::forget('currencies_all');
    }

    public static function warmupCache(): void
    {
        self::getCurrencies();
    }
}
