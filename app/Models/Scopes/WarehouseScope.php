<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait WarehouseScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $companyId = $filters['company_id'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($companyId, function (Builder $q, int $companyId) {
            $q->where('company_id', $companyId);
        });
    }
}
