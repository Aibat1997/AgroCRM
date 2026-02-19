<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait UnitScope
{
    public function scopeFilter(Builder $query, $filters = []): Builder
    {
        $id = (array)($filters['id'] ?? []);
        $type = (array)($filters['type'] ?? []);

        return $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($type, function (Builder $q, array $type) {
            $q->whereIn('type', $type);
        });
    }
}
