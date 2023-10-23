<?php

$prefix = '/staff';
return [
    'pluginName' => 'Staff',
    'prefix' => $prefix,
    'menus' => [
        [
            'path' => $prefix . '/user'
            , 'label' => 'Sale Order'
            , 'order' => 1
        ]
    ],

    'routes' => [
        $prefix . '/user' => [
            'meta' => [
                'title' => 'Manage User',
            ]
            , 'name' => 'user.index'
            , 'view' => 'user.index'
            , 'children' => [
                $prefix . '/user/:id' => [
                    'meta' => [
                        'title' => 'User Detail'
                    ]
                    , 'name' => 'user.detail'
                    , 'view' => 'user.detail'
                ]
            ]
        ]

    ],
    'views' => [
        'user.index' => '/users/index.vue'
        , 'user.detail' => '/users/FormUser.vue'
    ],
    'sideMenus' => [
        [
            'meta' => [
                'title' => "Manage User",
            ],
            'permission' => 'Staff.user',
            'view' => 'users/index',
            'path' => $prefix . '/user'
        ],
        [
            'meta' => [
                'title' => "Manage Role",
            ],
            'permission' => 'Staff.role',
            'view' => 'roles/index',
            'path' => $prefix . '/role'
        ],
        [
            'meta' => [
                'title' => "Manage Permission Group",
            ],
            'permission' => 'Staff.role',
            'view' => 'permission-groups/index',
            'path' => $prefix . '/permission-group'
        ],
        [
            'meta' => [
                'title' => "Manage Permission",
            ],
            'permission' => 'Staff.permission',
            'view' => 'permissions/index',
            'path' => $prefix . '/permissions'
        ],



    ]
];
