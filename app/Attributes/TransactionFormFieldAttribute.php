<?php

namespace App\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait TransactionFormFieldAttribute
{
    protected function fieldTitle(): Attribute
    {
        return Attribute::make(
            get: fn() => $this["field_title_" . app()->getLocale()],
        );
    }

    protected function fieldValuesUrl(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => $value ? url($value) : null,
        );
    }
}
