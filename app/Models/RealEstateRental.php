<?php

namespace App\Models;

use App\Models\Scopes\RealEstateRentalScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealEstateRental extends Model
{
    use SoftDeletes, RealEstateRentalScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'real_estate_id',
        'client_id',
        'from_date',
        'to_date',
        'payment_frequency_id',
        'amount',
        'area',
        'unit_id',
        'note',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['realEstate', 'paymentFrequency', 'unit'];

    /**
     * Get the real estate that owns the RealEstateRental
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function realEstate(): BelongsTo
    {
        return $this->belongsTo(RealEstate::class, 'real_estate_id', 'id');
    }

    /**
     * Get the client that owns the RealEstateRental
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    /**
     * Get the payment frequency that owns the RealEstateRental
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentFrequency(): BelongsTo
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

    /**
     * Get the RealEstateRental's file.
     */
    public function file(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
