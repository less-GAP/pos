<?php


namespace Modules\Salon\Actions\Plugin;


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
