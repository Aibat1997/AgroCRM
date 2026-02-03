<?php

namespace App\Models;

use App\Attributes\WarehouseItemAttribute;
use App\Models\Scopes\WarehouseItemScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarehouseItem extends Model
{
    use SoftDeletes, WarehouseItemScope, WarehouseItemAttribute;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'warehouse_id',
        'title',
        'quantity',
        'unit_id',
        'currency_id',
        'currency_rate',
        'original_unit_price',
        'unit_price',
        'supplier',
        'image',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['warehouse'];

    /**
     * Get the warehouse that owns the WarehouseItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'id');
    }

    /**
     * Get the unit that owns the WarehouseItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    /**
     * Get the currency that owns the WarehouseItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }
}
