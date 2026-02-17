<?php

namespace App\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait TransactionFormFieldAttribute
{
    protected function fieldTitle(): Attribute
    {
        return Attribute::make(
            get: fn(): string => $this["field_title_" . app()->getLocale()],
        );
    }

    protected function fieldValuesUrl(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value): ?string => $value ? url($value) : null,
        );
    }
}
