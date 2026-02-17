<?php

namespace App\Http\Resources\RealEstateType;

use App\Http\Resources\BaseCollection;

class RealEstateTypeCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = RealEstateTypeResource::class;
}
