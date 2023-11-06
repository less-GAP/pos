<?php

use Spatie\QueryBuilder\AllowedFilter;

return [
    'name' => 'Ecommerce',
    'image' => 'https://phuongnamvina.com/img_data/images/ecommerce.jpeg',
    'admin' => include(__DIR__ . '/admin/config.php'),
    'models' => [
        'product' => [
            'class' => \Plugins\Ecommerce\Models\Product::class,
            'allowedIncludes' => ['images', 'variants', 'places', 'cost_items', 'cost_items.images'],
            'allowedFilters' => [
                AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'name,sku'),
                AllowedFilter::exact('type', 'type')
            ]
        ],

        'taxonomy' => [
            'class' => \Plugins\Ecommerce\Models\Taxonomy::class,
            'allowedIncludes' => [],
            'allowedFilters' => [
                AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'order_code'),
                AllowedFilter::exact('type', 'type')
            ]
        ],
        'brand' => [
            'class' => \Plugins\Ecommerce\Models\Brand::class,
            'allowedIncludes' => [],
            'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'order_code')]
        ],
        'unit' => [
            'class' => \Plugins\Ecommerce\Models\Unit::class,
            'allowedIncludes' => [],
            'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'order_code')]
        ]

    ]
];
