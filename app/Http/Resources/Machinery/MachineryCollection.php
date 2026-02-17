<?php

namespace App\Http\Resources\Machinery;

use App\Http\Resources\BaseCollection;

class MachineryCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = MachineryResource::class;
}
