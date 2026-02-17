<?php

namespace App\Http\Resources\Company;

use App\Http\Resources\BaseCollection;

class CompanyCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = CompanyResource::class;
}
