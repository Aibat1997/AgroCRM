<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Machinery extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'transport_type_id',
        'title',
    ];

    /**
     * Get the company that owns the Machinery
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    /**
     * Get the transport_type that owns the Machinery
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transport_type(): BelongsTo
    {
        return $this->belongsTo(TransportType::class, 'transport_type_id', 'id');
    }
}
