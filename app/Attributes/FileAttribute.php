<?php

namespace App\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait FileAttribute
{
    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn(string $value): string => asset($value),
        );
    }
}
