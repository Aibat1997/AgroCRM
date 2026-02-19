<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait ApplicationScope
{
    public function scopeFilter(Builder $query, $filters = []): Builder
    {
        $id = (array)($filters['id'] ?? []);
        $authorName = $filters['author_name'] ?? null;
        $description = $filters['description'] ?? null;
        $status = $filters['status'] ?? null;

        return $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($authorName, function (Builder $q, string $authorName) {
            $q->whereHas('author', function (Builder $query) use ($authorName) {
                $query->where('name', 'like', "{$authorName}%");
            });
        })->when($description, function (Builder $q, string $description) {
            $q->whereRaw("MATCH(description) AGAINST(? IN BOOLEAN MODE)", [$description]);
        })->when($status, function (Builder $q, string $status) {
            $q->where('status', $status);
        });
    }
}
