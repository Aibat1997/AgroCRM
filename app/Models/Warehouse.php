<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'company_id',
        'title',
    ];

    /**
     * Get the company that owns the Warehouse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    /**
     * Get all of the items for the Warehouse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(WarehouseItem::class, 'warehouse_id', 'id');
    }
}
