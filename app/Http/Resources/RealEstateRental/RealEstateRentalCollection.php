<?php

namespace App\Http\Resources\RealEstateRental;

use App\Http\Resources\BaseCollection;

class RealEstateRentalCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = RealEstateRentalResource::class;
}
