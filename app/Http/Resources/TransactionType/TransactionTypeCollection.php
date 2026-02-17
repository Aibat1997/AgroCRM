<?php

namespace App\Http\Resources\TransactionType;

use App\Http\Resources\BaseCollection;

class TransactionTypeCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = TransactionTypeResource::class;
}
