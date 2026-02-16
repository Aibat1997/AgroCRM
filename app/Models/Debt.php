<?php

namespace App\Models;

use App\Enums\DebtStatus;
use App\Models\Scopes\DebtScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property DebtStatus $status
 * @property-read Company $company
 * @property-read Client $client
 * @property-read ?Transactionable $transactionable
 */
class Debt extends Model
{
    use SoftDeletes, DebtScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'company_id',
        'client_id',
        'amount',
        'percent',
        'issued_at',
        'due_date',
        'description',
        'paid_with_raw_materials',
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
            'paid_with_raw_materials' => 'boolean',
            'status' => DebtStatus::class,
        ];
    }

    /**
     * Get the company that owns the Debt
     *
     * @return BelongsTo<Company, $this>
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    /**
     * Get the client that owns the Debt
     *
     * @return BelongsTo<Client, $this>
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    /**
     * Get the Debt's transactionable.
     * 
     * @return MorphOne<Transactionable, $this>
     */
    public function transactionable(): MorphOne
    {
        return $this->morphOne(Transactionable::class, 'transactionable');
    }
}
