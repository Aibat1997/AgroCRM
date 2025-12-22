<?php

namespace App\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait RealEstateRentalAttribute
{
    protected function contract(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => $value ? asset($value) : null,
        );
    }
}
