<?php

namespace App\Http\Resources\PaymentMethod;

use App\Http\Resources\BaseCollection;

class PaymentMethodCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = PaymentMethodResource::class;
}
