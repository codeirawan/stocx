<?php

return [
    'role_structure' => [
        'super_administrator' => [
            'role' => 'v,c,u',
            'user' => 'v,c,u,d',
            'leave' => 'v,c,u,d,a,rj,rv,cl',
            'master' => 'v,c,u,d',
        ],
    ],
    'permission_structure' => [],
    'permissions_map' => [
        'v' => 'view',
        'c' => 'create',
        'u' => 'update',
        'd' => 'delete',
        'a' => 'approve',
        'rj' => 'reject',
        'rv' => 'revise',
        'cl' => 'cancel',
    ],
];

// php artisan db:seed --class=LaratrustSeeder
