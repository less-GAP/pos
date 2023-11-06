<?php

use App\Builder\EloquentRouter;
use Illuminate\Support\Facades\Route;
use Lessgap\ModelManager;
use Lessgap\Models\EventSetting;
use Modules\Admin\Actions\GetUserInfoAction;
use Modules\Admin\Actions\Customer\DeleteCustomerAction;
use Modules\Admin\Middleware\AdminIsAuthenticated;
use Spatie\QueryBuilder\AllowedFilter;

Route::get('/', function () {
    return 'admin api';
});
Route::post('auth/login', \Modules\Admin\Actions\Auth\PostLoginAction::class . '@handle');
Route::post('submit-patient', \Modules\Admin\Actions\SubmitPatientAction::class . '@handle');
Route::get('plugin/routes', \Modules\Admin\Actions\Plugin\GetRoutesAction::class . '@handle');

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
        ->routes(function () {
            Route::get('list', \Modules\Admin\Actions\File\GetListAction::class . '@handle');
            Route::post('/Upload', \Modules\Admin\Actions\File\PostUploadAction::class . '@handle');
            Route::post('/Info', \Modules\Admin\Actions\File\PostInfoAction::class . '@handle');
        })
        ->handle(
            \App\Models\File::class,
            [
                'allowedFilters' => [AllowedFilter::custom('search', new \App\Builder\Filters\SearchLikeMultipleField, 'file_name')]
            ]
        );

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



    Route::get('notifications', \Modules\Admin\Actions\Notification\GetNotifications::class . '@handle');
    Route::post('notification/read', \Modules\Admin\Actions\Notification\ReadAction::class . '@handle');
    Route::prefix('model')->group(function () {
        Route::get('/{model}/paginate', ModelManager::class . '@paginate');
        Route::get('/{model}/all', ModelManager::class . '@all');
        Route::post('/{model}/{id?}', ModelManager::class . '@updateOrCreate');
        Route::put('/{model}/{id?}', ModelManager::class . '@update');
        Route::get('/{model}/{id?}', ModelManager::class . '@getDetail');
    });
    Route::prefix('plugin')->group(function () {
        Route::get('/detail/{plugin}', \Modules\Admin\Actions\Plugin\GetPluginDetailAction::class . '@handle');
        Route::post('/status', \Modules\Admin\Actions\Plugin\PostPluginStatusAction::class . '@handle');
        Route::post('/install', \Modules\Admin\Actions\Plugin\PostInstallPluginAction::class . '@handle');
        Route::get('/menus', \Modules\Admin\Actions\Plugin\GetMenusAction::class . '@handle');
        Route::get('/list', \Modules\Admin\Actions\Plugin\GetPluginsAction::class . '@handle');
        Route::get('/configs', \Modules\Admin\Actions\Plugin\GetConfigAction::class . '@handle');
        Route::get('{plugin}/view', \Modules\Admin\Actions\Plugin\GetViewAction::class . '@handle');
        Route::get('{plugin}/sideMenus', \Modules\Admin\Actions\Plugin\GetSideMenusAction::class . '@handle');
    });
});
