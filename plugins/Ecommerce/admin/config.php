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
                $prefix . '/product/:id' => [
                    'meta' => [
                        'title' => 'Product management',
                    ],
                    'view' => '/product/form.vue'
                ],
                $prefix . '/branch' => [
                    'meta' => [
                        'title' => 'Branch management',
                    ],
                    'view' => '/branch/index.vue'
                ],
                $prefix . '/branch/:id' => [
                    'meta' => [
                        'title' => 'Branch management',
                    ],
                    'view' => '/branch/form.vue'
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
        ],
        [
            'meta' => [
                'title' => "Add Product",
            ],
            'permission' => 'Ecommerce.product',
            'path' => $prefix . '/product/new'
        ],
        [
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
                'title' => "Units",
            ],
            'permission' => 'Ecommerce.unit',
            'path' => $prefix . '/unit'
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


