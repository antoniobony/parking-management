<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Auth\Authenticatable;

 class admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
        
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
         'password' => 'hashed',
    ];

    public function cam():HasMany
    {
        return $this->hasMany(cam::class);
    }

    public function parking():HasOne
    {
        return $this->hasMany(parking::class);
    }

    public function message():HasMany
    {
        return $this->hasMany(message::class);
    }
}
