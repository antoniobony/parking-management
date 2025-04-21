<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class parking extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rule',
        'location',
        'picture',
        'type',
        'mode',
        'place',
        'admin_id',
        'price_minute'
    ];

    public function cams():Hasmany
    {
        return $this->hasMany(cams::class);
    }

    public function payment():HasMany
    {
        return $this->hasMany(payment::class);
    }

    public function admin():BelongsTo
    {
        return $this->belongsTo(admin::class);
    }

    public function parkingDuration():HasMany
    {
        return $this->hasMany(parkingDuration::class);
    }
}
