<?php

namespace App\Models;

use App\Attributes\RealEstateRentalAttribute;
use App\Models\Scopes\RealEstateRentalScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealEstateRental extends Model
{
    use SoftDeletes, RealEstateRentalScope, RealEstateRentalAttribute;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'real_estate_id',
        'tenant_name',
        'tenant_phone',
        'tenant_identifier',
        'from_date',
        'to_date',
        'payment_frequency_id',
        'amount',
        'area',
        'unit_id',
        'contract',
        'note',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['real_estate', 'payment_frequency', 'unit'];

    /**
     * Get the real_estate that owns the RealEstateRental
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function real_estate(): BelongsTo
    {
        return $this->belongsTo(RealEstate::class, 'real_estate_id', 'id');
    }

    /**
     * Get the payment_frequency that owns the RealEstateRental
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment_frequency(): BelongsTo
    {
        return $this->belongsTo(PaymentFrequency::class, 'payment_frequency_id', 'id');
    }

    /**
     * Get the unit that owns the RealEstateRental
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
