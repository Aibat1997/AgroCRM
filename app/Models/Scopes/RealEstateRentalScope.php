<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait RealEstateRentalScope
{
    public function scopeFilter(Builder $query, $filters = []): Builder
    {
        $id = (array)($filters['id'] ?? []);
        $realEstateId = $filters['real_estate_id'] ?? null;
        $tenantName = $filters['tenant_name'] ?? null;
        $fromDate = $filters['from_date'] ?? null;
        $toDate = $filters['to_date'] ?? null;

        return $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($realEstateId, function (Builder $q, int $realEstateId) {
            $q->where('real_estate_id', $realEstateId);
        })->when($tenantName, function (Builder $q, string $tenantName) {
            $q->whereHas('client', function (Builder $query) use ($tenantName) {
                $query->where('name', 'LIKE', "{$tenantName}%");
            });
        })->when($fromDate, function (Builder $q, string $fromDate) {
            $q->whereDate('from_date', '>=', $fromDate);
        })->when($toDate, function (Builder $q, string $toDate) {
            $q->whereDate('to_date', '<=', $toDate);
        });
    }
}
