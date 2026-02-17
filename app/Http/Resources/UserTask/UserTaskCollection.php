<?php

namespace App\Http\Resources\UserTask;

use App\Http\Resources\BaseCollection;

class UserTaskCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = UserTaskResource::class;
}
