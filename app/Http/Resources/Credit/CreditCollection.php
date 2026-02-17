<?php

namespace App\Http\Resources\Credit;

use App\Http\Resources\BaseCollection;

class CreditCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = CreditResource::class;
}
