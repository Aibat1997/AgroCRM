<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait CreditScope
{
    public function scopeFilter(Builder $query, $filters = []): Builder
    {
        $id = (array)($filters['id'] ?? []);
        $companyId = $filters['company_id'] ?? null;
        $status = $filters['status'] ?? null;

        return $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($companyId, function (Builder $q, int $companyId) {
            $q->where('company_id', $companyId);
        })->when($status, function (Builder $q, string $status) {
            $q->where('status', $status);
        });
    }
}
