<?php

namespace App\Entities;

use App\Entities\AbstractEntity;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends AbstractEntity
{
    use Notifiable;


    protected $fillable = [
        'telegram_id',
        'first_name',
        'last_name',
        'username'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
