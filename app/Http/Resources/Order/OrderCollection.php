<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\BaseCollection;

class OrderCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = OrderResource::class;
}
