<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait UserTaskScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $authorId = $filters['author_id'] ?? null;
        $userId = $filters['user_id'] ?? null;
        $title = $filters['title'] ?? null;
        $startDate = $filters['start_date'] ?? null;
        $finishDate = $filters['finish_date'] ?? null;
        $status = $filters['status'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($authorId, function (Builder $q, int $authorId) {
            $q->where('author_id', $authorId);
        })->when($userId, function (Builder $q, int $userId) {
            $q->where('user_id', $userId);
        })->when($title, function (Builder $q, string $title) {
            $q->where('title', 'LIKE', '%' . $title . '%');
        })->when($startDate, function (Builder $q, string $startDate) {
            $q->whereDate('start_date', '>=', $startDate);
        })->when($finishDate, function (Builder $q, string $finishDate) {
            $q->whereDate('finish_date', '<=', $finishDate);
        })->when($status, function (Builder $q, string $status) {
            $q->where('status', $status);
        });
    }
}
