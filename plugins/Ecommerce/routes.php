<?php

use App\Builder\EloquentRouter;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Middleware\AdminIsAuthenticated;
use Plugins\Ecommerce\Models\Category;
use Plugins\Ecommerce\Models\Product;
use Plugins\Sale\Models\SalesOrder;
use Spatie\QueryBuilder\AllowedFilter;

Route::middleware([AdminIsAuthenticated::class])->prefix(ADMIN_ROUTE_PREFIX)->group(function () {


});
