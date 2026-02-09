<?php

namespace App\Models;

use App\Attributes\TitleAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
     * Get all of the form fields for the TransactionType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formFields(): HasMany
    {
        return $this->hasMany(TransactionFormField::class, 'transaction_type_id', 'id');
    }
}
