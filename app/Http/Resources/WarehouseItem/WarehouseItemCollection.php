<?php

namespace App\Http\Resources\WarehouseItem;

use App\Http\Resources\BaseCollection;

class WarehouseItemCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = WarehouseItemResource::class;
}
