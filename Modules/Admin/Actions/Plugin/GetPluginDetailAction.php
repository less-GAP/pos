<?php


namespace Modules\Admin\Actions\Plugin;


use Illuminate\Http\Request;
use Lessgap\PluginManager;

class GetPluginDetailAction
{
    public function handle(Request $request)
    {
        return app(PluginManager::class)
            ->plugin($request->route('plugin'))
            ->detail('admin');
    }
}
