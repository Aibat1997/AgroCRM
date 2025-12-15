<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealEstate extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'real_estate_type_id',
        'address',
        'area',
        'cadastral_number',
        'rented_from',
        'rented_to',
        'note',
    ];

    /**
     * Get the real_estate_type that owns the RealEstate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function real_estate_type(): BelongsTo
    {
        return $this->belongsTo(RealEstateType::class, 'real_estate_type_id', 'id');
    }
}
