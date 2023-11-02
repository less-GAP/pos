<?php


namespace Modules\Salon\Actions\Plugin;


use Lessgap\PluginManager;

class GetConfigAction
{
    public function handle()
    {
        return app(PluginManager::class)->getConfigs('admin');
    }
}
