<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait WarehouseItemScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $warehouseId = $filters['warehouse_id'] ?? null;
        $title = $filters['title'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($warehouseId, function (Builder $q, int $warehouseId) {
            $q->where('warehouse_id', $warehouseId);
        })->when($title, function (Builder $q, string $title) {
            $q->where('title', 'LIKE', "{$title}%");
        });
    }
}
