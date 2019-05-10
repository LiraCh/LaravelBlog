<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function publications()
    {
        return $this->hasMany(Publication::class)->latest();
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }

}
