<?php

namespace App\Models;

use App\Enums\ApplicationStatus;
use App\Models\Scopes\ApplicationScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes, ApplicationScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'accountant_id',
        'description',
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
            'status' => ApplicationStatus::class,
        ];
    }

    /**
     * Get the user that owns the Application
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the accountant that owns the Application
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accountant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'accountant_id', 'id');
    }
}
