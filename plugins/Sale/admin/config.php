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
                'title' => 'Salse',
            ]
            , 'redirect' => $prefix . '/order'
            , 'children' => [
                $prefix . '/order' => [
                    'meta' => [
                        'title' => 'Sale Order',
                    ],
                    'view' => 'order.index'
                ],
                $prefix . '/order/:id' => [
                    'meta' => [
                        'title' => 'Sale Order Detail',
                    ],
                    'view' => 'order.detail'
                ]
            ],

        ]
    ],
    'views' => [
        'order.index' => '/order/index.vue'
        , 'order.detail' => '/order/form.vue'

    ],
    'sideMenus' => [
        [
            'meta' => [
                'title' => "Manage Orders",
            ],
            'permission' => 'Sales.order',
            'path' => $prefix . '/order'
        ],

    ]
];


