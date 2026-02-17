<?php

namespace App\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait TitleAttribute
{
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn(): string => $this["title_" . app()->getLocale()],
        );
    }
}
