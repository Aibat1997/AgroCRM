<?php

namespace App\Models;

use App\Attributes\TitleAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionType extends Model
{
    use SoftDeletes, TitleAttribute;

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
        'title_ru',
        'title_kk',
    ];

    /**
     * The formFields that belong to the TransactionType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function formFields(): BelongsToMany
    {
        return $this->belongsToMany(TransactionFormField::class, 'transaction_type_form_fields', 'transaction_type_id', 'transaction_form_field_id');
    }
}
