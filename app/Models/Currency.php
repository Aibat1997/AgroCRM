<?php

namespace App\Models;

use App\Attributes\TitleAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property-read string $title
 */
class Currency extends Model
{
    use SoftDeletes, TitleAttribute;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title_ru',
        'title_kk',
        'in_local_currency',
        'symbol',
        'sort_num',
    ];
}
