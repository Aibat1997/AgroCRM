<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait ClientScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $name = $filters['name'] ?? null;
        $phone = $filters['phone'] ?? null;
        $identifier = $filters['identifier'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($name, function (Builder $q, string $name) {
            $q->where('name', 'LIKE', '%' . $name . '%');
        })->when($phone, function (Builder $q, string $phone) {
            $q->where('phone', $phone);
        })->when($identifier, function (Builder $q, string $identifier) {
            $q->where('identifier', $identifier);
        });
    }
}
