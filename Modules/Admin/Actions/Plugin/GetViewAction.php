<?php


namespace Modules\Admin\Actions\Plugin;


use Lessgap\PluginManager;
use Illuminate\Http\Request;

class GetViewAction
{
    public function handle(Request $request)
    {
        return app(PluginManager::class)
            ->plugin($request->route('plugin'))
            ->view('admin', $request->input('path'));
    }
}
