<?php


namespace Modules\Admin\Actions\Plugin;


use Lessgap\PluginManager;

class GetConfigAction
{
    public function handle()
    {
        return app(PluginManager::class)->getConfigs('admin');
    }
}
