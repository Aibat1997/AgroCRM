<?php

namespace App\Models;

use App\Attributes\WarehouseItemAttribute;
use App\Models\Scopes\WarehouseItemScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property-read string|null $image
 */
class WarehouseItem extends Model
{
    use SoftDeletes, WarehouseItemAttribute, WarehouseItemScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'warehouse_id',
        'title',
        'article_number',
        'quantity',
        'unit_id',
        'min_sell_price',
        'image',
    ];

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
}
