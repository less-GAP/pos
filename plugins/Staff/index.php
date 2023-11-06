<?php

use Spatie\QueryBuilder\AllowedFilter;

return [
    'name' => 'Staff',
    'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJiUrt-hWX3xKUQvxJ0k4_683hC2U4eIj00g&usqp=CAU',
    'admin' => include(__DIR__ . '/admin/config.php'),
    'config' => [

    ],
    'models' => [
        'user' => [
            'class' => \App\Models\User::class,
            'allowedIncludes' => [],
            'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'name')]
        ],
        'place' => [
            'class' => \Plugins\Staff\Models\Place::class,
            'allowedIncludes' => ['group'],
            'allowedFilters' => [
                AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'name'),
                AllowedFilter::exact('group','group_id')
            ]
        ],
        'place_group' => [
            'class' => \Plugins\Staff\Models\PlaceGroup::class,
            'allowedIncludes' => [],
            'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'name')]
        ],
    ]
];
