<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
    'firstName',
    'lastName',
    'email',
    'password',
    'contactNumber',
    'role',
    'user_id',
];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // IMPORTANTE: Kini nag-ingon sa Laravel nga ang password naka-hash
    protected $casts = [
        'password' => 'hashed',
    ];
}