<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
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
        'transaction_id',
        'transaction_form_field_id',
        'field_value',
    ];

    /**
     * Get the transaction that owns the TransactionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    /**
     * Get the transaction form field that owns the TransactionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transactionFormField(): BelongsTo
    {
        return $this->belongsTo(TransactionFormField::class, 'transaction_form_field_id', 'id');
    }
}
