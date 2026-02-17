<?php

namespace App\Http\Resources\Warehouse;

use App\Http\Resources\BaseCollection;

class WarehouseCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = WarehouseResource::class;
}
