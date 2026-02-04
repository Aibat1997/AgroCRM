<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait ApplicationScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $userName = $filters['user_name'] ?? null;
        $description = $filters['description'] ?? null;
        $status = $filters['status'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($userName, function (Builder $q, string $userName) {
            $q->whereHas('user', function (Builder $query) use ($userName) {
                $query->where('name', 'like', "{$userName}%");
            });
        })->when($description, function (Builder $q, string $description) {
            $q->whereRaw("MATCH(description) AGAINST(? IN BOOLEAN MODE)", [$description]);
        })->when($status, function (Builder $q, string $status) {
            $q->where('status', $status);
        });
    }
}
