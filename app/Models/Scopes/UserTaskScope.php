<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait UserTaskScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $authorName = $filters['author_name'] ?? null;
        $executorName = $filters['executor_name'] ?? null;
        $title = $filters['title'] ?? null;
        $startDate = $filters['start_date'] ?? null;
        $finishDate = $filters['finish_date'] ?? null;
        $status = $filters['status'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($authorName, function (Builder $q, string $authorName) {
            $q->whereHas('author', function (Builder $query) use ($authorName) {
                $query->where('name', 'like', "{$authorName}%");
            });
        })->when($executorName, function (Builder $q, string $executorName) {
            $q->whereHas('executor', function (Builder $query) use ($executorName) {
                $query->where('name', 'like', "{$executorName}%");
            });
        })->when($title, function (Builder $q, string $title) {
            $q->where('title', 'LIKE', "{$title}%");
        })->when($startDate, function (Builder $q, string $startDate) {
            $q->whereDate('start_date', '>=', $startDate);
        })->when($finishDate, function (Builder $q, string $finishDate) {
            $q->whereDate('finish_date', '<=', $finishDate);
        })->when($status, function (Builder $q, string $status) {
            $q->where('status', $status);
        });
    }
}
