<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait CottonPreparationScope
{
    public function scopeFilter(Builder $query, $filters = []): void
    {
        $id = (array)($filters['id'] ?? []);
        $weigherId = $filters['weigher_id'] ?? null;
        $laboratorianId = $filters['laboratorian_id'] ?? null;
        $invoiceNumber = $filters['invoice_number'] ?? null;
        $supplier = $filters['supplier'] ?? null;
        $supplierIdentifier = $filters['supplier_identifier'] ?? null;
        $status = $filters['status'] ?? null;

        $query->when($id, function (Builder $q, array $id) {
            $q->whereIn('id', $id);
        })->when($weigherId, function (Builder $q, int $weigherId) {
            $q->where('weigher_id', $weigherId);
        })->when($laboratorianId, function (Builder $q, int $laboratorianId) {
            $q->where('laboratorian_id', $laboratorianId);
        })->when($invoiceNumber, function (Builder $q, string $invoiceNumber) {
            $q->where('invoice_number', $invoiceNumber);
        })->when($supplier, function (Builder $q, string $supplier) {
            $q->where('supplier', 'LIKE', '%' . $supplier . '%');
        })->when($supplierIdentifier, function (Builder $q, string $supplierIdentifier) {
            $q->where('supplier_identifier', $supplierIdentifier);
        })->when($status, function (Builder $q, string $status) {
            $q->where('status', $status);
        });
    }
}
