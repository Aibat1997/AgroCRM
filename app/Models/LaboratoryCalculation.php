<?php

namespace App\Models;

use App\Models\Scopes\LaboratoryCalculationScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaboratoryCalculation extends Model
{
    use SoftDeletes, LaboratoryCalculationScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'variety',
        'picking_type',
        'pile',
        'batch',
        'gross_weight',
        'container_weight',
        'physical_weight',
        'actual_contamination',
        'estimated_weight',
        'actual_humidity',
        'conditioned_weight',
    ];

    /**
     * Get the user that owns the LaboratoryCalculation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
