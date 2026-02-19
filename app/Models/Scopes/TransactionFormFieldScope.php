<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait TransactionFormFieldScope
{
    public function scopeFilter(Builder $query, $filters = []): Builder
    {
        $id = (array)($filters['id'] ?? []);
        $transactionTypeId = $filters['transaction_type_id'] ?? null;

        return $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($transactionTypeId, function (Builder $q, int $transactionTypeId) {
            $q->whereRelation('transactionTypes', 'transaction_type_id', $transactionTypeId);
        });
    }
}
