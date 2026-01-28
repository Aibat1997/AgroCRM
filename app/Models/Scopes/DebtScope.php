<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait DebtScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $companyId = $filters['company_id'] ?? null;
        $clientId = $filters['client_id'] ?? null;
        $fromDueDate = $filters['from_due_date'] ?? null;
        $toDueDate = $filters['to_due_date'] ?? null;
        $amount = $filters['amount'] ?? null;
        $isClientOwes = $filters['is_client_owes'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($companyId, function (Builder $q, int $companyId) {
            $q->where('company_id', $companyId);
        })->when($clientId, function (Builder $q, int $clientId) {
            $q->where('client_id', $clientId);
        })->when($fromDueDate, function (Builder $q, string $fromDueDate) {
            $q->where('due_date', '>=', $fromDueDate);
        })->when($toDueDate, function (Builder $q, string $toDueDate) {
            $q->where('due_date', '<=', $toDueDate);
        })->when($amount, function (Builder $q, int $amount) {
            $q->where('amount', $amount);
        })->when(isset($isClientOwes), function (Builder $q, bool $isClientOwes) {
            $q->where('is_client_owes', $isClientOwes);
        });
    }
}
