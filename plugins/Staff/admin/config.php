<?php

$prefix = '/staff';
return [
    'prefix' => $prefix,
    'title' => 'Staff',
    'menus' => [
        [
            'path' => $prefix . '/user'
            , 'icon' => 'fa fa-building-o'
            , 'label' => 'Staff'
            , 'order' => 1
        ]
    ],
    'routes' => [
        $prefix => [
            'meta' => [
                'title' => 'Staff',
            ]
            , 'redirect' => $prefix . '/user'
            , 'children' => [
                $prefix . '/user' => [
                    'meta' => [
                        'title' => 'Manage User',
                    ]
                    , 'view' => 'user.index'
                    , 'children' => [
                        $prefix . '/user/:id' => [
                            'meta' => [
                                'title' => 'User Detail'
                            ]
                            , 'view' => 'user.detail'
                        ]
                    ]
                ],
                $prefix . '/role' => [
                    'meta' => [
                        'title' => 'Manage Role',
                    ]
                    , 'view' => 'role.index'
                    , 'children' => [
                        $prefix . '/role/:id' => [
                            'meta' => [
                                'title' => 'Role Detail'
                            ]
                            , 'view' => 'role.detail'
                        ], $prefix . '/role/:id/permissions' => [
                            'meta' => [
                                'title' => 'Role Permissions'
                            ]
                            , 'view' => 'role.permissions'
                        ]
                    ]
                ],
                $prefix . '/permission' => [
                    'meta' => [
                        'title' => 'Manage Permission',
                    ]
                    , 'view' => 'permission.index'
                    , 'children' => [
                        $prefix . '/permission/:id' => [
                            'meta' => [
                                'title' => 'Role Detail'
                            ]
                            , 'view' => 'permission.detail'
                        ]
                    ]
                ],
                $prefix . '/permission-group' => [
                    'meta' => [
                        'title' => 'Manage Role',
                    ]
                    , 'view' => 'permission-group.index'
                    , 'children' => [
                        $prefix . '/permission-group/:id' => [
                            'meta' => [
                                'title' => 'Permission Group Detail'
                            ]
                            , 'view' => 'permission-group.detail'
                        ],
                    ]
                ]
            ]
        ],


    ],
    'views' => [
        'user.index' => '/user/index.vue'
        , 'user.detail' => '/user/FormUser.vue'
        , 'role.index' => '/role/index.vue'
        , 'role.detail' => '/role/form.vue'
        , 'role.permissions' => '/role/permissions.vue'
        , 'permission.index' => '/permission/index.vue'
        , 'permission.detail' => '/permission/form.vue'
        , 'permission-group.index' => '/permission-group/index.vue'
        , 'permission-group.detail' => '/permission-group/form.vue'
    ],
    'sideMenus' => [
        [
            'meta' => [
                'title' => "Manage User",
            ],
            'permission' => 'Staff.user',
            'path' => $prefix . '/user'
        ],
        [
            'meta' => [
                'title' => "Manage Role",
            ],
            'permission' => 'Staff.role',
            'path' => $prefix . '/role'
        ],

        [
            'meta' => [
                'title' => "Manage Permission",
            ],
            'permission' => 'Staff.permission',
            'path' => $prefix . '/permission'
        ],
        [
            'meta' => [
                'title' => "Manage Permission Group",
            ],
            'permission' => 'Staff.role',
            'path' => $prefix . '/permission-group'
        ],

    ]
];
