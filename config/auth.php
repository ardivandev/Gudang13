<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    'guards' => [
        'web' => [ // untuk pengguna biasa
            'driver' => 'session',
            'provider' => 'users',
        ],
        'petugas' => [ // untuk petugas/admin
            'driver' => 'session',
            'provider' => 'petugas',
        ],
    ],

    'providers' => [
        'users' => [ // pengguna
            'driver' => 'eloquent',
            'model' => App\Models\Pengguna::class,
        ],
        'petugas' => [ // petugas
            'driver' => 'eloquent',
            'model' => App\Models\Petugas::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
        'petugas' => [
            'provider' => 'petugas',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];