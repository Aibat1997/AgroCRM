<?php

namespace App\Observers;

use App\FileSystem\UploadImage;
use App\Models\WarehouseItem;

class WarehouseItemObserver
{
    /**
     * Handle the User "saving" event.
     */
    public function saving(WarehouseItem $warehouseItem): void
    {
        if (request()->file('image')) {
            $image = (new UploadImage(request()->image))->save('warehouse-items');
            $warehouseItem->image = $image;
        }
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
