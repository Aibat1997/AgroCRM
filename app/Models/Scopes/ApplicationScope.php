<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait ApplicationScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $user_id = $filters['user_id'] ?? null;
        $description = $filters['description'] ?? null;
        $status = $filters['status'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($user_id, function (Builder $q, int $user_id) {
            $q->where('user_id', $user_id);
        })->when($description, function (Builder $q, string $description) {
            $q->where('description', 'LIKE', '%' . $description . '%');
        })->when($status, function (Builder $q, string $status) {
            $q->where('status', $status);
        });
    }
}
