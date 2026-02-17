<?php

namespace App\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait WarehouseItemAttribute
{
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value): ?string => $value ? asset($value) : $value,
        );
    }
}
