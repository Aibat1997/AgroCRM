<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait OrderScope
{
    public function scopeFilter(Builder $query, $filters = []): Builder
    {
        $id = (array)($filters['id'] ?? []);
        $companyId = $filters['company_id'] ?? null;
        $authorId = $filters['author_id'] ?? null;
        $clientName = $filters['client_name'] ?? null;
        $paymentMethodId = $filters['payment_method_id'] ?? null;
        $fromAmount = $filters['from_amount'] ?? null;
        $toAmount = $filters['to_amount'] ?? null;
        $isPurchase = (bool)($filters['is_purchase'] ?? null);
        $status = $filters['status'] ?? null;

        return $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($companyId, function (Builder $q, int $companyId) {
            $q->where('company_id', $companyId);
        })->when($authorId, function (Builder $q, int $authorId) {
            $q->where('author_id', $authorId);
        })->when($clientName, function (Builder $q, string $clientName) {
            $q->whereHas('client', function (Builder $query) use ($clientName) {
                $query->where('name', 'LIKE', "{$clientName}%");
            });
        })->when($paymentMethodId, function (Builder $q, int $paymentMethodId) {
            $q->where('payment_method_id', $paymentMethodId);
        })->when($fromAmount, function (Builder $q, float $fromAmount) {
            $q->where('total_amount', '>=', $fromAmount);
        })->when($toAmount, function (Builder $q, float $toAmount) {
            $q->where('total_amount', '<=', $toAmount);
        })->when(isset($isPurchase), function (Builder $q) use ($isPurchase) {
            $q->where('is_purchase', $isPurchase);
        })->when($status, function (Builder $q, string $status) {
            $q->where('status', $status);
        });
    }
}
