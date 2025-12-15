<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait MachineryScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $company_id = $filters['company_id'] ?? null;
        $driver_id = $filters['driver_id'] ?? null;
        $title = $filters['title'] ?? null;
        $identifier = $filters['identifier'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($company_id, function (Builder $q, int $company_id) {
            $q->where('company_id', $company_id);
        })->when($driver_id, function (Builder $q, int $driver_id) {
            $q->where('driver_id', $driver_id);
        })->when($title, function (Builder $q, string $title) {
            $q->where('title', 'LIKE', '%' . $title . '%');
        })->when($identifier, function (Builder $q, string $identifier) {
            $q->where('identifier', $identifier);
        });
    }
}
