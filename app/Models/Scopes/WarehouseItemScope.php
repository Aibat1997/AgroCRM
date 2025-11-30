<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait WarehouseItemScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $warehouse_id = $filters['warehouse_id'] ?? null;
        $title = $filters['title'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($warehouse_id, function (Builder $q, int $warehouse_id) {
            $q->where('warehouse_id', $warehouse_id);
        })->when($title, function (Builder $q, string $title) {
            $q->where('title', 'LIKE', "%{$title}%");
        });
    }
}
