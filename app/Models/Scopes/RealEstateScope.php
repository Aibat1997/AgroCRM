<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait RealEstateScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $real_estate_type_id = $filters['real_estate_type_id'] ?? null;
        $address = $filters['address'] ?? null;
        $cadastral_number = $filters['cadastral_number'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($address, function (Builder $q, string $address) {
            $q->where('address', 'LIKE', '%' . $address . '%');
        })->when($cadastral_number, function (Builder $q, string $cadastral_number) {
            $q->where('cadastral_number', $cadastral_number);
        })->when($real_estate_type_id, function (Builder $q, int $real_estate_type_id) {
            $q->where('real_estate_type_id', $real_estate_type_id);
        });
    }
}
