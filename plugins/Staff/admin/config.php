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
            , 'order' => 11
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
                    , 'view' => '/user/index.vue'
                    , 'children' => [
                        $prefix . '/user/:id' => [
                            'meta' => [
                                'title' => 'User Detail'
                            ]
                            , 'view' => '/user/FormUser.vue'
                        ]
                    ]
                ],
                $prefix . '/place' => [
                    'meta' => [
                        'title' => 'Manage Place',
                    ]
                    , 'view' => '/place/index.vue'
                    , 'children' => [
                        $prefix . '/place/:id' => [
                            'meta' => [
                                'title' => 'Place Detail'
                            ]
                            , 'view' => '/place/form.vue'
                        ]
                    ]
                ],
                $prefix . '/role' => [
                    'meta' => [
                        'title' => 'Manage Role',
                    ]
                    , 'view' => '/role/index.vue'
                    , 'children' => [
                        $prefix . '/role/:id' => [
                            'meta' => [
                                'title' => 'Role Detail'
                            ]
                            , 'view' => '/role/form.vue'

                        ], $prefix . '/role/:id/permissions' => [
                            'meta' => [
                                'title' => 'Role Permissions'
                            ]
                            , 'view' => '/role/permissions.vue'

                        ]
                    ]
                ],
                $prefix . '/permission' => [
                    'meta' => [
                        'title' => 'Manage Permission',
                    ]
                    , 'view' => '/permission/index.vue'

                    , 'children' => [
                        $prefix . '/permission/:id' => [
                            'meta' => [
                                'title' => 'Role Detail'
                            ]
                            , 'view' => '/permission/form.vue'

                        ]
                    ]
                ],
                $prefix . '/permission-group' => [
                    'meta' => [
                        'title' => 'Manage Role',
                    ]
                    , 'view' => '/permission-group/index.vue'

                    , 'children' => [
                        $prefix . '/permission-group/:id' => [
                            'meta' => [
                                'title' => 'Permission Group Detail'
                            ]
                            , 'view' => '/permission-group/form.vue'

                        ],
                    ]
                ]
            ]
        ],

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
