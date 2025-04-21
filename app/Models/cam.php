<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class cam extends Model
{
    use HasFactory;
    protected $fillable = [
        'video'
    ];

    public function admin():BelongsTo
    {
        return $this->belongsTo(admin::class);
    }
}
