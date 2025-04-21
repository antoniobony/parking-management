<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class payment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'price',
        'payment_date',
        'parking_duration_id',
        'session_id'
    ];

    protected $casts = [
        "payment_date" => "datetime:d-m-Y H:i:s",
    ];

    public function parking_duration():BelongsTo
    {
        return $this->belongsTo(parkingDuration::class);
    }
}