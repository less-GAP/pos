<?php

use App\Builder\EloquentRouter;
use App\Models\EmailTemplate;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Lessgap\Models\EventSetting;
use Modules\Admin\Actions\GetUserInfoAction;
use Modules\Admin\Actions\User\DeleteUserAction;
use Modules\Admin\Actions\Customer\DeleteCustomerAction;
use Modules\Admin\Middleware\AdminIsAuthenticated;
use Spatie\QueryBuilder\AllowedFilter;

Route::get('/', function () {
    return 'admin api';
});
Route::post('auth/login', \Modules\Admin\Actions\Auth\PostLoginAction::class . '@handle');
Route::post('submit-patient', \Modules\Admin\Actions\SubmitPatientAction::class . '@handle');

EloquentRouter::prefix('master-data')
    ->handle(
        \App\Models\MasterData::class,
        []
    )->routes(function () {
        Route::get('{listKey}/options', \Modules\Admin\Actions\MasterData\GetOptionsAction::class . '@handle');
    });


Route::prefix('/config')->group(function () {
    Route::get('/', \Modules\Admin\Actions\Config\GetListAction::class . '@handle');
});

Route::middleware([AdminIsAuthenticated::class])->group(function () {
    Route::prefix('/config')->group(function () {
        Route::post('/', \Modules\Admin\Actions\Config\PostAction::class . '@handle');
        Route::post('/testSmtp', \Modules\Admin\Actions\Config\PostTestSmtpAction::class . '@handle');
    });

    Route::prefix('/auth')->group(function () {
        Route::get('userInfo', GetUserInfoAction::class . '@handle');
    });
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


    EloquentRouter::prefix('logs')
        ->handle(
            \App\Models\LogActivity::class,
            [
                // 'allowedIncludes' => ['users'],
                'allowedFilters' => [
                    AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'description'),
                ]
            ]
        )->routes(
            function () {
                // Route::get('list', \Modules\Admin\Actions\Doctor\GetListAction::class . '@handle');
            }
        );

    EloquentRouter::prefix('post')
        ->handle(
            \App\Models\Post::class,
            [

                'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'title')]
            ]
        )->routes(function () {
        });
    EloquentRouter::prefix('sales/order')
        ->handle(
            \App\Models\SalesOrder::class,
            [
                'allowedIncludes' => ['products', 'customer'],
                'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'order_code')]
            ]
        )->routes(function () {
        });


    EloquentRouter::prefix('activity')
        ->handle(
            \App\Models\LogActivity::class,
            [
                'autoPermission' => true,
                'allowedIncludes' => ['user'],
                'allowedSorts' => ['id'],
                'allowedFilters' => [
                    AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'description'), AllowedFilter::exact('causer_id'), AllowedFilter::exact('subject_id'), AllowedFilter::exact('subject_type')
                ]
            ]
        )->routes(function () {
        });


    EloquentRouter::prefix('file')
        ->handle(
            \App\Models\File::class,
            [
                'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'file_name')]
            ]
        )->routes(function () {
            Route::get('list', \Modules\Admin\Actions\File\GetListAction::class . '@handle');
            Route::post('/Upload', \Modules\Admin\Actions\File\PostUploadAction::class . '@handle');
            Route::post('/Info', \Modules\Admin\Actions\File\PostInfoAction::class . '@handle');
        });

    EloquentRouter::prefix('email')
        ->handle(
            \App\Models\Email::class,
            [
                'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'email_title,email_to')]
            ]
        );
    EloquentRouter::prefix('event-setting')
        ->handle(
            EventSetting::class,
            [
                'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'event_name')]
            ]
        );
    EloquentRouter::prefix('email-template')
        ->handle(
            \App\Models\EmailTemplate::class,
            [
                'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'email_title,email_content')]
            ]
        );

    Route::prefix('/customer')->group(function () {
        Route::get('list', \Modules\Admin\Actions\Customer\GetListAction::class . '@handle');
        Route::post('activeList', \Modules\Admin\Actions\Customer\PostActiveListAction::class . '@handle');
        Route::delete('{id}', DeleteCustomerAction::class . '@handle');
    });


    Route::prefix('/countries')->group(function () {
        Route::get('list', \Modules\Admin\Actions\Countries\GetListAction::class . '@handle');
        Route::get('all', \Modules\Admin\Actions\Countries\GetAllAction::class . '@handle');
        Route::post('', \Modules\Admin\Actions\Countries\PostAction::class . '@handle');
        Route::get('{id}', \Modules\Admin\Actions\Countries\GetDetailAction::class . '@handle');
        Route::post('activeList', \Modules\Admin\Actions\Countries\PostActiveListAction::class . '@handle');
        Route::delete('{id}', \Modules\Admin\Actions\Countries\DeleteAction::class . '@handle');
    });


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
    Route::get('notifications', \Modules\Admin\Actions\Notification\GetNotifications::class . '@handle');
    Route::post('notification/read', \Modules\Admin\Actions\Notification\ReadAction::class . '@handle');
});
