<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class AdminUser extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guard_name = 'admin';

    protected $fillable = [
        'name', 'email', 'password', 'is_super',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_super' => 'boolean',
    ];
}
