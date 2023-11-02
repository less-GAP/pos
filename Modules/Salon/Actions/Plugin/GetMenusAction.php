<?php


namespace Modules\Salon\Actions\Plugin;


use Lessgap\PluginManager;

class GetMenusAction
{
    public function handle()
    {
        return app(PluginManager::class)->menus('admin');
    }
}
