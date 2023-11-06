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
                    'view' => '/product/index.vue',
                    'children' => [
                        $prefix . '/product/:id' => [
                            'meta' => [
                                'title' => 'Product management',
                            ],
                            'view' => '/product/formProduct.vue'
                        ],

                        $prefix . '/service/:id' => [
                            'meta' => [
                                'title' => 'Service management',
                            ],
                            'view' => '/product/formService.vue'
                        ],
                    ]
                ],
                $prefix . '/service-place' => [
                    'meta' => [
                        'title' => 'Place management',
                    ],
                    'view' => '/service-place/index.vue',
                    'children' => [
                        $prefix . '/service-place/:id' => [
                            'meta' => [
                                'title' => 'Place management',
                            ],
                            'view' => '/service-place/form.vue'
                        ],
                    ]
                ],


                $prefix . '/category' => [
                    'meta' => [
                        'title' => 'Category management',
                    ],
                    'view' => '/category/index.vue'
                ],
                $prefix . '/category/:id' => [
                    'meta' => [
                        'title' => 'Category management',
                    ],
                    'view' => '/category/form.vue'
                ],
                $prefix . '/brand' => [
                    'meta' => [
                        'title' => 'Brand management',
                    ],
                    'view' => '/brand/index.vue'
                ],
                $prefix . '/brand/:id' => [
                    'meta' => [
                        'title' => 'Brand management',
                    ],
                    'view' => '/brand/form.vue'
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


