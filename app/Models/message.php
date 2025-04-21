<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class message extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'admin_id',
        'driver_id'
    ];

    public function admin():BelognsTo
    {
        return $this->belongsTo(admin::class);
    }

    public function driver():BelognsTo
    {
        return $this->belongsTo(driver::class);
    }
}
