<?php

namespace App\Models;

use App\Attributes\TransactionFormFieldAttribute;
use App\Models\Scopes\TransactionFormFieldScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionFormField extends Model
{
    use SoftDeletes, TransactionFormFieldAttribute, TransactionFormFieldScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'transaction_type_id',
        'field_label_ru',
        'field_label_kk',
        'field_tag',
        'field_name',
        'field_type',
        'field_values_url',
        'field_attributes',
        'field_validation',
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
            'field_attributes' => 'array',
            'is_required' => 'boolean',
        ];
    }

    /**
     * Get the transaction type that owns the TransactionFormField
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transactionType(): BelongsTo
    {
        return $this->belongsTo(TransactionType::class, 'transaction_type_id', 'id');
    }
}
