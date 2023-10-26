<?php


namespace Modules\Admin\Actions\Plugin;


use Lessgap\PluginManager;

class GetPluginsAction
{
    public function handle()
    {
        return app(PluginManager::class)->getPlugins();
    }
}
