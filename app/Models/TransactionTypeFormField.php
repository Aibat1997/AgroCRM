<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Scopes\TransactionTypeFormFieldScope;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TransactionTypeFormField extends Pivot
{
    use TransactionTypeFormFieldScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'transaction_type_id',
        'transaction_form_field_id',
        'is_required',
        'sort_num',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_required' => 'boolean',
        ];
    }

    /**
     * Get the transaction type that owns the TransactionTypeFormField
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transactionType(): BelongsTo
    {
        return $this->belongsTo(TransactionType::class, 'transaction_type_id', 'id');
    }

    /**
     * Get the transaction form field that owns the TransactionTypeFormField
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transactionFormField(): BelongsTo
    {
        return $this->belongsTo(TransactionFormField::class, 'transaction_form_field_id', 'id');
    }
}
