<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait WarehouseScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $company_id = $filters['company_id'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($company_id, function (Builder $q, int $company_id) {
            $q->where('company_id', $company_id);
        });
    }
}
