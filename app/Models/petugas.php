<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use Notifiable;

    protected $table = 'petugas';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'password',
        'nip',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
