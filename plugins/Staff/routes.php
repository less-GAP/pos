<?php

use App\Builder\EloquentRouter;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Middleware\AdminIsAuthenticated;
use Spatie\QueryBuilder\AllowedFilter;

Route::middleware([AdminIsAuthenticated::class])->prefix(ADMIN_ROUTE_PREFIX)->group(function () {
    EloquentRouter::prefix('staff/user')
        ->routes(function () {
            Route::get('/options', \Modules\Admin\Actions\User\GetUserOptionsAction::class . '@handle');
            Route::get('list', \Modules\Admin\Actions\User\GetUserListAction::class . '@handle');
            Route::post('{id?}', \Modules\Admin\Actions\User\PostUserAction::class . '@handle');
            // Route::delete('{id}', \Modules\Admin\Actions\User\DeleteUserAction::class . '@handle');
        })
        ->handle(
            \App\Models\User::class,
            [
                'allowedIncludes' => ['roles', 'roles.permissions', 'permissions', 'logs'],
                'allowedFilters' => [
                    AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'full_name,username'), AllowedFilter::custom('roles.name', new \App\Builder\Filters\SearchRelationShip, 'roles.name')
                ]
            ]
        );
    EloquentRouter::prefix('/staff/role')
        ->handle(
            \App\Models\Role::class,
            [
                'allowedFilters' => [
                    AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'name')
                ],
                'allowedIncludes' => ['permissions']
            ]
        );
    EloquentRouter::prefix('/staff/permission')
        ->routes(function () {
            Route::get('groups', \Modules\Admin\Actions\Staff\GetGroupPermission::class . '@handle');
        })
        ->handle(
            \App\Models\Permission::class,
            [
                'allowedFilters' => [
                    AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'name'),
                    AllowedFilter::exact('status'),
                    AllowedFilter::exact('group_id'),

                ],
                'allowedIncludes' => ['group']
            ]
        );
    EloquentRouter::prefix('/staff/permission-group')
        ->handle(
            \App\Models\PermissionGroup::class,
            [
                'allowedFilters' => [
                    AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'name'),
                ],
                'allowedIncludes' => ['items']
            ]
        );
});
