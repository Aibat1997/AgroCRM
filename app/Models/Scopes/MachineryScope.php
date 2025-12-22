<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait MachineryScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $companyId = $filters['company_id'] ?? null;
        $driverId = $filters['driver_id'] ?? null;
        $title = $filters['title'] ?? null;
        $identifier = $filters['identifier'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($companyId, function (Builder $q, int $companyId) {
            $q->where('company_id', $companyId);
        })->when($driverId, function (Builder $q, int $driverId) {
            $q->where('driver_id', $driverId);
        })->when($title, function (Builder $q, string $title) {
            $q->where('title', 'LIKE', '%' . $title . '%');
        })->when($identifier, function (Builder $q, string $identifier) {
            $q->where('identifier', $identifier);
        });
    }
}
