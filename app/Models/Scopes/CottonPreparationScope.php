<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait CottonPreparationScope
{
    public function scopeFilter(Builder $query, $filters = []): Builder
    {
        $id = (array)($filters['id'] ?? []);
        $invoiceNumber = $filters['invoice_number'] ?? null;
        $supplier = $filters['supplier'] ?? null;
        $supplierIdentifier = $filters['supplier_identifier'] ?? null;
        $status = $filters['status'] ?? null;

        return $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($invoiceNumber, function (Builder $q, string $invoiceNumber) {
            $q->where('invoice_number', $invoiceNumber);
        })->when($supplier, function (Builder $q, string $supplier) {
            $q->whereHas('client', function (Builder $query) use ($supplier) {
                $query->where('name', 'LIKE', "{$supplier}%");
            });
        })->when($supplierIdentifier, function (Builder $q, string $supplierIdentifier) {
            $q->whereHas('client', function (Builder $query) use ($supplierIdentifier) {
                $query->where('identifier', $supplierIdentifier);
            });
        })->when($status, function (Builder $q, string $status) {
            $q->where('status', $status);
        });
    }
}
