<?php

namespace Modules\Admin;


use App\Providers\AbstractModuleProvider;

class ServiceProvider extends AbstractModuleProvider
{
    protected $middleware = [];
    protected $routePrefix = ADMIN_ROUTE_PREFIX;

}
