<?php

namespace App\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait UserAttribute
{
    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => $value ? asset($value) : asset('api-assets/d-user.png'),
        );
    }
}
