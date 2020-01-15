<?php

return [

    

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'usuariopaineladm',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'usuariopaineladm',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'usuariopaineladm',
            'hash' => false,
        ],
    ],


    'providers' => [
        'usuariopaineladm' => [
            'driver' => 'eloquent',
            'model' => App\UsuarioPainelAdministrativo::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],


    'passwords' => [
        'usuariopaineladm' => [
            'provider' => 'usuariopaineladm',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
