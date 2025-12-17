<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait LaboratoryCalculationScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $userId = $filters['user_id'] ?? null;
        $fromDate = $filters['from_date'] ?? null;
        $toDate = $filters['to_date'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($userId, function (Builder $q, int $userId) {
            $q->where('user_id', $userId);
        })->when($fromDate, function (Builder $q, string $fromDate) {
            $q->whereDate('created_at', '>=', $fromDate);
        })->when($toDate, function (Builder $q, string $toDate) {
            $q->whereDate('created_at', '<=', $toDate);
        });
    }
}
