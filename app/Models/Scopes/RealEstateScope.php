<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait RealEstateScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $realEstateTypeId = $filters['real_estate_type_id'] ?? null;
        $address = $filters['address'] ?? null;
        $cadastralNumber = $filters['cadastral_number'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($address, function (Builder $q, string $address) {
            $q->where('address', 'LIKE', '%' . $address . '%');
        })->when($cadastralNumber, function (Builder $q, string $cadastralNumber) {
            $q->where('cadastral_number', $cadastralNumber);
        })->when($realEstateTypeId, function (Builder $q, int $realEstateTypeId) {
            $q->where('real_estate_type_id', $realEstateTypeId);
        });
    }
}
