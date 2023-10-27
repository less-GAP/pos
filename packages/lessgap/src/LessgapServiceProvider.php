<?php

namespace Lessgap;

use Illuminate\Support\ServiceProvider;
use Lessgap\Events\NotificationEventHandler;
use Lessgap\Notifications\LessgapNotification;
use Illuminate\Contracts\Foundation\Application;
use Lessgap\Services\EmailService;
use Lessgap\Services\RealtimeService;

class LessgapServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(EmailService::class, function (Application $app) {
            return new EmailService();
        });
        $this->app->singleton(PluginManager::class, function (Application $app) {
            return new PluginManager();
        });
        $this->app->singleton(RealtimeService::class, function (Application $app) {
            return new RealtimeService();
        });
        $activePlugins = \DB::table('plugins')->where('status', 'active')->pluck('name');
        $pluginDir = base_path('/plugins');
        foreach ($activePlugins as $activePlugin) {
            $config = include($pluginDir . '/' . $activePlugin . '/index.php');
            app(PluginManager::class)->add($activePlugin, $config);
        }
    }
}
