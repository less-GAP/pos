<?php

use App\Builder\EloquentRouter;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Middleware\AdminIsAuthenticated;
use Plugins\Ecommerce\Models\Category;
use Plugins\Ecommerce\Models\Product;
use Plugins\Sale\Models\SalesOrder;
use Spatie\QueryBuilder\AllowedFilter;

Route::middleware([AdminIsAuthenticated::class])->prefix(ADMIN_ROUTE_PREFIX)->group(function () {
    EloquentRouter::prefix('/ecommerce/product')
        ->handle(
            Product::class,
            [
                'allowedIncludes' => [ 'images'],
                'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'order_code')]
            ]
        )->routes(function () {
        });
    EloquentRouter::prefix('/ecommerce/category')
        ->handle(
            Category::class,
            [
                'allowedIncludes' => [],
                'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'order_code')]
            ]
        )->routes(function () {
        });
    EloquentRouter::prefix('/ecommerce/branch')
        ->handle(
            \Plugins\Ecommerce\Models\Branch::class,
            [
                'allowedIncludes' => [],
                'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'order_code')]
            ]
        )->routes(function () {
        });

});
