<?php

namespace App\Models;

use App\Enums\CottonPreparationStatus;
use App\Models\Scopes\CottonPreparationScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CottonPreparation extends Model
{
    use SoftDeletes, CottonPreparationScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'weigher_id',
        'laboratorian_id',
        'invoice_number',
        'transport',
        'supplier',
        'supplier_identifier',
        'gross_weight',
        'container_weight',
        'physical_weight',
        'cotton_receiving_point',
        'selective_variety',
        'variety',
        'pile',
        'batch',
        'picking_type',
        'contamination',
        'estimated_weight',
        'humidity',
        'conditioned_weight',
        'weighing_date',
        'laboratory_date',
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
            'status' => CottonPreparationStatus::class,
        ];
    }

    /**
     * Get the weigher that owns the CottonPreparation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function weigher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'weigher_id', 'id');
    }

    /**
     * Get the laboratorian that owns the CottonPreparation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function laboratorian(): BelongsTo
    {
        return $this->belongsTo(User::class, 'laboratorian_id', 'id');
    }
}
