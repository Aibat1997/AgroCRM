<?php

namespace App\Http\Resources\Debt;

use App\Http\Resources\BaseCollection;

class DebtCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = DebtResource::class;
}
