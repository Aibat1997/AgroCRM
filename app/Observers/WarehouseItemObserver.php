<?php

namespace App\Observers;

use App\FileSystem\UploadImage;
use App\Models\WarehouseItem;
use App\Services\CacheService;

class WarehouseItemObserver
{
    /**
     * Handle the WarehouseItem "saving" event.
     */
    public function saving(WarehouseItem $warehouseItem): void
    {
        if (request()->file('image')) {
            $image = (new UploadImage(request()->image))->save('warehouse-items');
            $warehouseItem->image = $image;
        }

        $locale_currency_rate = CacheService::getCurrencyById($warehouseItem->currency_id)['in_local_currency'] ?? 1;
        $warehouseItem->unit_price = $warehouseItem->original_unit_price * $locale_currency_rate;
    }

    /**
     * Handle the WarehouseItem "created" event.
     */
    public function created(WarehouseItem $warehouseItem): void
    {
        //
    }

    /**
     * Handle the WarehouseItem "updated" event.
     */
    public function updated(WarehouseItem $warehouseItem): void
    {
        //
    }

    /**
     * Handle the WarehouseItem "deleted" event.
     */
    public function deleted(WarehouseItem $warehouseItem): void
    {
        //
    }

    /**
     * Handle the WarehouseItem "restored" event.
     */
    public function restored(WarehouseItem $warehouseItem): void
    {
        //
    }

    /**
     * Handle the WarehouseItem "force deleted" event.
     */
    public function forceDeleted(WarehouseItem $warehouseItem): void
    {
        //
    }
}
