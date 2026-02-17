<?php

namespace App\Http\Resources\Unit;

use App\Http\Resources\BaseCollection;

class UnitCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = UnitResource::class;
}
