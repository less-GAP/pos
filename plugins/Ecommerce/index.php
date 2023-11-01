<?php

use Spatie\QueryBuilder\AllowedFilter;

return [
    'name' => 'Ecommerce',
    'image' => 'https://phuongnamvina.com/img_data/images/ecommerce.jpeg',
    'admin' => include(__DIR__ . '/admin/config.php'),
    'models' => [
        'product' => [
            'class' => \Plugins\Ecommerce\Models\Product::class,
            'allowedIncludes' => ['images'],
            'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'order_code')]
        ],
        'category' => [
            'class' => \Plugins\Ecommerce\Models\Category::class,
            'allowedIncludes' => [],
            'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'order_code')]
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
