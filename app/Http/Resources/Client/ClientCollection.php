<?php

namespace App\Http\Resources\Client;

use App\Http\Resources\BaseCollection;

class ClientCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = ClientResource::class;
}
