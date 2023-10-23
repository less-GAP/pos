<?php


namespace Modules\Admin\Actions\Plugin;


use Lessgap\PluginManager;

class GetMenusAction
{
    public function handle()
    {
        return app(PluginManager::class)->menus('admin');
    }
}
