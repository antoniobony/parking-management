<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class parkingDuration extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'parking_start',
        'parking_end',
        'parking_id',
        'driver_id',
        'carNumber'
    ];

    protected $casts = [
        "parking_start" => "datetime:d-m-Y H:i:s",
        "parking_end"=> "datetime:d-m-Y H:i:s"
    ];
    
    public function parking():BelongsTo
    {
        return $this->belongsTo(parking::class);
    }

    public function driver():BelongsTo
    {
        return $this->belongsTo(driver::class);
    }
}
