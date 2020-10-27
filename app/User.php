<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Application;

class User extends Authenticatable
{
    use Notifiable;

    public function buyedApps()
    {
        return $this->hasMany("App\Purchase","user_id");
    }

    public function wishes()
    {
        return $this->hasMany("App\Wishlist","user_id");
    }

    public function crafted()
    {
        return $this->hasMany("App\Application","user_id");

    }

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
