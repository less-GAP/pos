<?php

$prefix = '/plugin/sale';
return [
    'pluginName' => 'Sales',
    'prefix' => $prefix,
    'menus' => [
        [
            'path' => $prefix . '/order'
            , 'label' => 'Sale Order'
            , 'order' => 1
        ]
    ],

    'routes' => [
        $prefix . '/order' => [
            'label' => 'Sale Order'
            , 'view' => 'index'
            , 'children'=>[

            ]
        ],
        $prefix . '/order/:id' => [
            'label' => 'Sale Order Detail'
            , 'view' => 'detail'
        ]
    ],
    'views' => [
        'index' => 'SalesOrder.vue'
        , 'detail' => 'SalesOrderDetail.vue'
    ],
    'sideMenus' => [
        [
            'meta' => [
                'title' => "Sales Orders",
            ],
            'permission' => 'Sales.order',
            'path' =>$prefix . '/order'
        ],

        [
            'meta' => [
                'title' => "New Sales",
            ],
            'path' => "/sales/order/new",
        ],
        [
            'meta' => [
                'title' => "Sales Return List",
            ],
            'path' => "/sales/return-list",
        ], [
            'meta' => [
                'title' => "New Sales Return",
            ],
            'path' => "/sales/return-list/new",
        ]
    ]
];
