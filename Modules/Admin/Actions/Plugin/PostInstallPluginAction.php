<?php


namespace Modules\Admin\Actions\Plugin;


use Illuminate\Http\Request;
use Lessgap\PluginManager;

class PostInstallPluginAction
{
    public function handle(Request $request)
    {
        return app(PluginManager::class)
            ->plugin($request->input('name'))
            ->install();
    }
}
