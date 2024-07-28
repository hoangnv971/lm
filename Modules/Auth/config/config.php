<?php

return [
    'name' => 'Auth',
    'guards' => [
        'admin' => [
            'driver' => 'session',
            'provider' => 'admin',
        ],
    ],

    'providers' => [
        'admin' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', Modules\Auth\Models\Admin::class),
        ],
    ],
];
