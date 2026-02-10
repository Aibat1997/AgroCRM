<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Scopes\TransactionTypeFormFieldScope;

class TransactionTypeFormField extends Model
{
    use TransactionTypeFormFieldScope;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

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
