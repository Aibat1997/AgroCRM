<?php

namespace App\Models;

use App\Attributes\CompanyAttribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property-read string $logo
 * @property-read ?Company $parent
 * @property-read Collection<int, Company> $childs
 * @property-read Collection<int, Warehouse> $warehouses
 * @property-read Collection<int, Machinery> $machineries
 * @property-read Collection<int, Transaction> $transactions
 * @property-read CompanyBalance $balance
 */
class Company extends Model
{
    use CompanyAttribute, SoftDeletes;

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
     * @return BelongsTo<Company, $this>
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    /**
     * Get all of the childs for the Company
     *
     * @return HasMany<Company, $this>
     */
    public function childs(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    /**
     * Get all of the warehouses for the Company
     *
     * @return HasMany<Warehouse, $this>
     */
    public function warehouses(): HasMany
    {
        return $this->hasMany(Warehouse::class, 'company_id', 'id');
    }

    /**
     * Get all of the machineries for the Company
     *
     * @return HasMany<Machinery, $this>
     */
    public function machineries(): HasMany
    {
        return $this->hasMany(Machinery::class, 'company_id', 'id');
    }

    /**
     * Get all of the transactions for the Company
     *
     * @return HasMany<Transaction, $this>
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'company_id', 'id');
    }

    /**
     * Get the balance associated with the Company
     * 
     * @return HasOne<CompanyBalance, $this>
     */
    public function balance(): HasOne
    {
        return $this->hasOne(CompanyBalance::class, 'company_id', 'id');
    }
}
