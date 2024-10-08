<?php

return [



    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

  

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],


    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'controleurs' => [
            'driver' => 'database',
            'table' => 'controleurs',
        ],

        'analystes' => [
            'driver' => 'database',
            'table' => 'analystes',
        ],
    ],

  

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],


    'password_timeout' => 10800,

];
