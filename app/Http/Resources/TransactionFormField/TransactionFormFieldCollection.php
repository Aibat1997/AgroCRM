<?php

namespace App\Http\Resources\TransactionFormField;

use App\Http\Resources\BaseCollection;

class TransactionFormFieldCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = TransactionFormFieldResource::class;
}
