<?php


namespace Modules\Admin\Actions\Plugin;


use Lessgap\PluginManager;

class GetRoutesAction
{
    public function handle()
    {
        return app(PluginManager::class)->routes('admin');
    }
}
