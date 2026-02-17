<?php

namespace App\Http\Resources\Application;

use App\Http\Resources\BaseCollection;

class ApplicationCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = ApplicationResource::class;
}
