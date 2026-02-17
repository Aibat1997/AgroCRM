<?php

namespace App\Http\Resources\Transaction;

use App\Http\Resources\BaseCollection;

class TransactionCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = TransactionResource::class;
}
