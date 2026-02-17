<?php

namespace App\Http\Resources\File;

use App\Http\Resources\BaseCollection;

class FileCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = FileResource::class;
}
