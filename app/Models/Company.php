<?php

namespace App\Models;

use App\Attributes\CompanyAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    use SoftDeletes, CompanyAttribute;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'parent_id',
        'name',
        'logo',
    ];

    /**
     * Get the parent that owns the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    /**
     * Get all of the childs for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    /**
     * Get all of the warehouses for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function warehouses(): HasMany
    {
        return $this->hasMany(Warehouse::class, 'company_id', 'id');
    }

    /**
     * Get all of the machineries for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function machineries(): HasMany
    {
        return $this->hasMany(Machinery::class, 'company_id', 'id');
    }

    /**
     * Get all of the transactions for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'company_id', 'id');
    }

    /**
     * Get the balance associated with the Company
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function balance(): HasOne
    {
        return $this->hasOne(CompanyBalance::class, 'company_id', 'id');
    }
}
