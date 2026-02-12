<?php

namespace App\Models;

use App\Enums\CreditStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Credit extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'company_id',
        'bank_name',
        'amount',
        'term_in_months',
        'payment_frequency_id',
        'payment_frequency_amount',
        'description',
        'status',
        'receipt_date',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => CreditStatus::class,
        ];
    }
}
