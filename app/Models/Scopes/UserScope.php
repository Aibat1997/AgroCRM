<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait UserScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $name = $filters['name'] ?? null;
        $phone = $filters['phone'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($name, function (Builder $q, string $name) {
            $q->where('name', 'like', '%' . $name . '%');
        })->when($phone, function (Builder $q, string $phone) {
            $q->where('phone', $phone);
        });
    }
}
