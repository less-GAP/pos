<?php


namespace Modules\Salon\Actions\Plugin;


use Lessgap\PluginManager;

class GetPluginsAction
{
    public function handle()
    {
        $pluginDir = base_path('/plugins');
        $result = [];
        foreach (glob($pluginDir . '/*', GLOB_ONLYDIR) as $pluginName) {
            $result[] = app(PluginManager::class)
                ->loadPlugin(basename($pluginName))->toArray();
        }
        return $result;
    }
}
