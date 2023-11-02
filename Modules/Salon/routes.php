<?php

use App\Builder\EloquentRouter;
use Illuminate\Support\Facades\Route;
use Lessgap\ModelManager;
use Lessgap\Models\EventSetting;
use Modules\Salon\Actions\GetUserInfoAction;
use Modules\Salon\Actions\Customer\DeleteCustomerAction;
use Modules\Salon\Middleware\AdminIsAuthenticated;
use Spatie\QueryBuilder\AllowedFilter;

Route::get('/', function () {
    return 'admin api';
});
Route::post('auth/login', \Modules\Salon\Actions\Auth\PostLoginAction::class . '@handle');
Route::post('submit-patient', \Modules\Salon\Actions\SubmitPatientAction::class . '@handle');
Route::get('plugin/routes', \Modules\Salon\Actions\Plugin\GetRoutesAction::class . '@handle');

EloquentRouter::prefix('master-data')
    ->handle(
        \App\Models\MasterData::class,
        []
    )->routes(function () {
        Route::get('{listKey}/options', \Modules\Salon\Actions\MasterData\GetOptionsAction::class . '@handle');
    });


Route::prefix('/config')->group(function () {
    Route::get('/', \Modules\Salon\Actions\Config\GetListAction::class . '@handle');
});

Route::middleware([AdminIsAuthenticated::class])->group(function () {
    Route::prefix('/config')->group(function () {
        Route::post('/', \Modules\Salon\Actions\Config\PostAction::class . '@handle');
        Route::post('/testSmtp', \Modules\Salon\Actions\Config\PostTestSmtpAction::class . '@handle');
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
                // Route::get('list', \Modules\Salon\Actions\Doctor\GetListAction::class . '@handle');
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
            Route::get('list', \Modules\Salon\Actions\File\GetListAction::class . '@handle');
            Route::post('/Upload', \Modules\Salon\Actions\File\PostUploadAction::class . '@handle');
            Route::post('/Info', \Modules\Salon\Actions\File\PostInfoAction::class . '@handle');
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
        Route::get('list', \Modules\Salon\Actions\Customer\GetListAction::class . '@handle');
        Route::post('activeList', \Modules\Salon\Actions\Customer\PostActiveListAction::class . '@handle');
        Route::delete('{id}', DeleteCustomerAction::class . '@handle');
    });


    Route::prefix('/countries')->group(function () {
        Route::get('list', \Modules\Salon\Actions\Countries\GetListAction::class . '@handle');
        Route::get('all', \Modules\Salon\Actions\Countries\GetAllAction::class . '@handle');
        Route::post('', \Modules\Salon\Actions\Countries\PostAction::class . '@handle');
        Route::get('{id}', \Modules\Salon\Actions\Countries\GetDetailAction::class . '@handle');
        Route::post('activeList', \Modules\Salon\Actions\Countries\PostActiveListAction::class . '@handle');
        Route::delete('{id}', \Modules\Salon\Actions\Countries\DeleteAction::class . '@handle');
    });



    Route::get('notifications', \Modules\Salon\Actions\Notification\GetNotifications::class . '@handle');
    Route::post('notification/read', \Modules\Salon\Actions\Notification\ReadAction::class . '@handle');
    Route::prefix('model')->group(function () {
        Route::get('/{model}/paginate', ModelManager::class . '@paginate');
        Route::get('/{model}/all', ModelManager::class . '@all');
        Route::post('/{model}/{id?}', ModelManager::class . '@updateOrCreate');
        Route::get('/{model}/{id?}', ModelManager::class . '@getDetail');
    });
    Route::prefix('plugin')->group(function () {
        Route::get('/detail/{plugin}', \Modules\Salon\Actions\Plugin\GetPluginDetailAction::class . '@handle');
        Route::post('/status', \Modules\Salon\Actions\Plugin\PostPluginStatusAction::class . '@handle');
        Route::post('/install', \Modules\Salon\Actions\Plugin\PostInstallPluginAction::class . '@handle');
        Route::get('/menus', \Modules\Salon\Actions\Plugin\GetMenusAction::class . '@handle');
        Route::get('/list', \Modules\Salon\Actions\Plugin\GetPluginsAction::class . '@handle');
        Route::get('/configs', \Modules\Salon\Actions\Plugin\GetConfigAction::class . '@handle');
        Route::get('{plugin}/view', \Modules\Salon\Actions\Plugin\GetViewAction::class . '@handle');
        Route::get('{plugin}/sideMenus', \Modules\Salon\Actions\Plugin\GetSideMenusAction::class . '@handle');
    });
});
