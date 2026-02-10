<?php

namespace App\Models;

use App\Attributes\TransactionFormFieldAttribute;
use App\Models\Scopes\TransactionFormFieldScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionFormField extends Model
{
    use SoftDeletes, TransactionFormFieldAttribute, TransactionFormFieldScope;

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
        'parent_id',
        'field_title_ru',
        'field_title_kk',
        'field_tag',
        'field_name',
        'field_type',
        'field_values_url',
        'field_attributes',
        'field_validation',
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
        ];
    }

    /**
     * The transaction types that belong to the TransactionFormField
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function transactionTypes(): BelongsToMany
    {
        return $this->belongsToMany(TransactionType::class, 'transaction_type_form_fields', 'transaction_form_field_id', 'transaction_type_id');
    }
}
