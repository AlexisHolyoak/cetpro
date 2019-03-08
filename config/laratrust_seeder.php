<?php

return [
    'role_structure' => [
        'administrator' => [
            'users' => 'c,r,u,d',
            'students'=>'c,r,u,d'
        ],
        'user' => [
            'students' => 'r'
        ],
        'student'=>[
            'students'=>'u,r'
        ],
        'teacher'=>[
            'students'=>'r'
        ]
    ],
    'permission_structure' => [
        'ru_student' => [
            'students' => 'r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
