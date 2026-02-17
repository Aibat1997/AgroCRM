<?php

namespace App\Http\Resources\PaymentFrequency;

use App\Http\Resources\BaseCollection;

class PaymentFrequencyCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = PaymentFrequencyResource::class;
}
