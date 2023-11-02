<?php


namespace Modules\Salon\Actions\Plugin;


use Lessgap\PluginManager;

class GetRoutesAction
{
    public function handle()
    {
        return app(PluginManager::class)->routes('admin');
    }
}
