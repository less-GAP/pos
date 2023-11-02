<?php

namespace Modules\Salon;


use App\Providers\AbstractModuleProvider;

class ServiceProvider extends AbstractModuleProvider
{
    protected $middleware = [];
    protected $routePrefix = ADMIN_ROUTE_PREFIX;

}
