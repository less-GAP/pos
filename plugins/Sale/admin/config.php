<?php

$prefix = '/sales';
return [
    'prefix' => $prefix,
    'title' => 'Sales',
    'menus' => [
        [
            'path' => $prefix . '/order'
            , 'icon' => 'fa fa-money'
            , 'label' => 'Sale'
            , 'order' => 1
        ]
    ],
    'routes' => [
        $prefix => [
            'meta' => [
                'title' => 'Sales',
            ]
            , 'redirect' => $prefix . '/order'
            , 'children' => [
                $prefix . '/pos' => [
                    'meta' => [
                        'title' => 'Pos',
                    ],
                    'view' => '/pos/index.vue'
                ],
                $prefix . '/order' => [
                    'meta' => [
                        'title' => 'Sale Order',
                    ],
                    'view' => '/order/index.vue'
                ],
                $prefix . '/order/:id' => [
                    'meta' => [
                        'title' => 'Sale Order Detail',
                    ],
                    'view' => 'order.form'
                ],
                $prefix . '/order/:id/detail' => [
                    'meta' => [
                        'title' => 'Sale Order Detail',
                    ],
                    'view' => '/order/detail.vue'
                ]
            ],

        ]
    ],

    'sideMenus' => [
        [
            'meta' => [
                'title' => "POS",
            ],
            'permission' => 'Sales.pos',
            'path' => $prefix . '/pos'
        ],
        [
            'meta' => [
                'title' => "Manage Orders",
            ],
            'permission' => 'Sales.order',
            'path' => $prefix . '/order'
        ],

    ]
];


