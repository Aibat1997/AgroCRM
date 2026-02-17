<?php

namespace App\Http\Resources\RealEstate;

use App\Http\Resources\BaseCollection;

class RealEstateCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = RealEstateResource::class;
}
