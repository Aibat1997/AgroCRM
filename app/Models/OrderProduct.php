<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'order_id',
        'warehouse_item_id',
        'unit_price',
        'quantity',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['warehouseItem'];

    /**
     * Get the order that owns the OrderProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    /**
     * Get the warehouse item that owns the OrderProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function warehouseItem(): BelongsTo
    {
        return $this->belongsTo(WarehouseItem::class, 'warehouse_item_id', 'id');
    }
}
