<?php

namespace App\Models;

use App\Models\Scopes\RealEstateScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealEstate extends Model
{
    use SoftDeletes, RealEstateScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'real_estate_type_id',
        'address',
        'area',
        'unit_id',
        'cadastral_number',
        'rented_from',
        'rented_to',
        'note',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['realEstateType', 'unit'];

    /**
     * Get the real estate type that owns the RealEstate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function realEstateType(): BelongsTo
    {
        return $this->belongsTo(RealEstateType::class, 'real_estate_type_id', 'id');
    }

    /**
     * Get the unit that owns the RealEstate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    /**
     * Get all of the RealEstate's files.
     */
    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
