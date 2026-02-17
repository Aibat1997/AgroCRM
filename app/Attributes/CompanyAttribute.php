<?php

namespace App\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait CompanyAttribute
{
    protected function logo(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value): string => $value ? asset($value) : asset('api-assets/d-company.png'),
        );
    }
}
