<?php

namespace App\Http\Resources\CottonPurchasePrice;

use App\Http\Resources\BaseCollection;

class CottonPurchasePriceCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = CottonPurchasePriceResource::class;
}
