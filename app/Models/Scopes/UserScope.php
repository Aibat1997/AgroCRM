<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait UserScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $role_id = (array)($filters['role_id'] ?? []);
        $company_id = (array)($filters['company_id'] ?? []);
        $name = $filters['name'] ?? null;
        $phone = $filters['phone'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($role_id, function (Builder $q, array $role_id) {
            $q->whereIn('role_id', $role_id);
        })->when($company_id, function (Builder $q, array $company_id) {
            $q->whereIn('company_id', $company_id);
        })->when($name, function (Builder $q, string $name) {
            $q->where('name', 'LIKE', '%' . $name . '%');
        })->when($phone, function (Builder $q, string $phone) {
            $q->where('phone', $phone);
        });
    }
}
