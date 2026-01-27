<?php

namespace App\Services;

use App\Models\CottonPurchasePrice;
use Illuminate\Support\Facades\Cache;

final class CottonPurchasePriceCacheService
{
    private const CACHE_KEY = 'latest_cotton_purchase_price';
    private const CACHE_TTL = 3600 * 3; // 3 hours

    public function getLatestCottonPurchasePrice(): CottonPurchasePrice
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return CottonPurchasePrice::latest()->first();
        });
    }

    public function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    public function warmupCache(): void
    {
        $this->getLatestCottonPurchasePrice();
    }
}
