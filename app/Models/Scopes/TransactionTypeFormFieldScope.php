<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait TransactionTypeFormFieldScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $transactionTypeId = $filters['transaction_type_id'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($transactionTypeId, function (Builder $q, int $transactionTypeId) {
            $q->where('transaction_type_id', $transactionTypeId);
        });
    }
}
