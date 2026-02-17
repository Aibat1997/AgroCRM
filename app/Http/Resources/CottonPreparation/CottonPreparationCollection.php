<?php

namespace App\Http\Resources\CottonPreparation;

use App\Http\Resources\BaseCollection;

class CottonPreparationCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = CottonPreparationResource::class;
}
