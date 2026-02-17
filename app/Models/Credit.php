<?php

namespace App\Models;

use App\Enums\CreditStatus;
use App\Models\Scopes\CreditScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property-read CreditStatus $status
 */
class Credit extends Model
{
    use CreditScope, SoftDeletes;

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
        'receipt_date',
        'status',
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

    /**
     * Get the company that owns the Credit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    /**
     * Get the payment frequency that owns the Credit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentFrequency(): BelongsTo
    {
        return $this->belongsTo(PaymentFrequency::class, 'payment_frequency_id', 'id');
    }
}
