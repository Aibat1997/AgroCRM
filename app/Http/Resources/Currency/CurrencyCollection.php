<?php

namespace App\Http\Resources\Currency;

use App\Http\Resources\BaseCollection;

class CurrencyCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = CurrencyResource::class;
}
