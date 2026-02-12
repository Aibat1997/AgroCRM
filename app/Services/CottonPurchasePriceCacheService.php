<?php

namespace App\Services;

use App\Enums\CottonPurchasePriceType;
use App\Models\CottonPurchasePrice;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

final class CottonPurchasePriceCacheService
{
    private const CACHE_KEY = 'latest_cotton_purchase_prices';
    private const CACHE_TTL = 3600 * 3; // 3 hours

    public function getLatestCottonPurchasePrices(): Collection
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return CottonPurchasePrice::latest()->get()->groupBy('purchase_type')->map(fn($group) => $group->first())->values();
        });
    }

    public function getLatestCottonPurchasePriceByType(CottonPurchasePriceType $type): ?CottonPurchasePrice
    {
        return $this->getLatestCottonPurchasePrices()->firstWhere('purchase_type', $type->value);
    }

    public function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    public function warmupCache(): void
    {
        $this->getLatestCottonPurchasePrices();
    }
}
