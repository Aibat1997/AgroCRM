<?php

namespace App\Http\Resources\UserRole;

use App\Http\Resources\BaseCollection;

class UserRoleCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = UserRoleResource::class;
}
