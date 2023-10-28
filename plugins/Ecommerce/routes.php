<?php

use App\Builder\EloquentRouter;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Middleware\AdminIsAuthenticated;
use Plugins\Sale\Models\SalesOrder;
use Spatie\QueryBuilder\AllowedFilter;

Route::middleware([AdminIsAuthenticated::class])->prefix(ADMIN_ROUTE_PREFIX)->group(function () {
    EloquentRouter::prefix('/sales/order')
        ->handle(
            SalesOrder::class,
            [
                'allowedIncludes' => ['products', 'customer'],
                'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'order_code')]
            ]
        )->routes(function () {
        });
    EloquentRouter::prefix('/sales/customer')
        ->handle(
            \Plugins\Sale\Models\Customer::class,
            [
                'allowedIncludes' => [],
                'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'order_code')]
            ]
        )->routes(function () {
        });
});
