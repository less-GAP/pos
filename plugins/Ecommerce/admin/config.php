<?php

$prefix = '/ecommerce';
return [
    'prefix' => $prefix,
    'title' => 'Ecommerce',
    'menus' => [
        [
            'path' => $prefix . '/product'
            , 'icon' => 'fa fa-shopping-bag'
            , 'label' => 'Ecommerce'
            , 'order' => 1
        ]
    ],
    'routes' => [
        $prefix => [
            'meta' => [
                'title' => 'Sales',
            ]
            , 'redirect' => $prefix . '/product'
            , 'children' => [

                $prefix . '/product' => [
                    'meta' => [
                        'title' => 'Product management',
                    ],
                    'view' => '/product/index.vue'
                ],

            ],

        ]
    ],

    'sideMenus' => [
        [
            'meta' => [
                'title' => "Products",
            ],
            'permission' => 'Ecommerce.product',
            'path' => $prefix . '/product'
        ], [
            'meta' => [
                'title' => "Categories",
            ],
            'permission' => 'Ecommerce.category',
            'path' => $prefix . '/category'
        ],
        [
            'meta' => [
                'title' => "Branchs",
            ],
            'permission' => 'Ecommerce.branch',
            'path' => $prefix . '/branch'
        ],
        [
            'meta' => [
                'title' => "Suppliers",
            ],
            'permission' => 'Ecommerce.supplier',
            'path' => $prefix . '/supplier'
        ],
        [
            'meta' => [
                'title' => "Import Products",
            ],
            'permission' => 'Ecommerce.importProduct',
            'path' => $prefix . '/supplier'
        ],

    ]
];


