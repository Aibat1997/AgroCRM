<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait DebtScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $companyId = $filters['company_id'] ?? null;
        $clientName = $filters['client_name'] ?? null;
        $fromDueDate = $filters['from_due_date'] ?? null;
        $toDueDate = $filters['to_due_date'] ?? null;
        $fromAmount = $filters['from_amount'] ?? null;
        $toAmount = $filters['to_amount'] ?? null;
        $isClientOwes = $filters['is_client_owes'] ?? null;
        $status = $filters['status'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($companyId, function (Builder $q, int $companyId) {
            $q->where('company_id', $companyId);
        })->when($clientName, function (Builder $q, string $clientName) {
            $q->whereHas('client', function (Builder $query) use ($clientName) {
                $query->where('name', 'LIKE', "{$clientName}%");
            });
        })->when($fromDueDate, function (Builder $q, string $fromDueDate) {
            $q->where('due_date', '>=', $fromDueDate);
        })->when($toDueDate, function (Builder $q, string $toDueDate) {
            $q->where('due_date', '<=', $toDueDate);
        })->when($fromAmount, function (Builder $q, int $fromAmount) {
            $q->where('amount', '>=', $fromAmount);
        })->when($toAmount, function (Builder $q, int $toAmount) {
            $q->where('amount', '<=', $toAmount);
        })->when(isset($isClientOwes), function (Builder $q, bool $isClientOwes) {
            $q->where('is_client_owes', $isClientOwes);
        })->when($status, function (Builder $q, string $status) {
            $q->where('status', $status);
        });
    }
}
