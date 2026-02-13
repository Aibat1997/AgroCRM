<?php

namespace App\Models;

use App\Enums\UserTaskStatus;
use App\Models\Scopes\UserTaskScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTask extends Model
{
    use SoftDeletes, UserTaskScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'author_id',
        'executor_id',
        'title',
        'description',
        'start_date',
        'finish_date',
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
            'status' => UserTaskStatus::class,
        ];
    }

    /**
     * Get the author that owns the UserTask
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    /**
     * Get the executor that owns the UserTask
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function executor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'executor_id', 'id');
    }
}
