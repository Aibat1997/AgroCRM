<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait UserScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $roleId = (array)($filters['role_id'] ?? []);
        $companyId = (array)($filters['company_id'] ?? []);
        $name = $filters['name'] ?? null;
        $phone = $filters['phone'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($roleId, function (Builder $q, array $roleId) {
            $q->whereIn('role_id', $roleId);
        })->when($companyId, function (Builder $q, array $companyId) {
            $q->whereIn('company_id', $companyId);
        })->when($name, function (Builder $q, string $name) {
            $q->where('name', 'LIKE', '%' . $name . '%');
        })->when($phone, function (Builder $q, string $phone) {
            $q->where('phone', $phone);
        });
    }
}
