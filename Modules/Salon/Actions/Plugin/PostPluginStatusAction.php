<?php


namespace Modules\Salon\Actions\Plugin;


use Illuminate\Http\Request;
use Lessgap\PluginManager;

class PostPluginStatusAction
{
    public function handle(Request $request)
    {
        $status = $request->input('status');
        $plugin = app(PluginManager::class)
            ->plugin($request->input('name'));
        if ($status == 'disable') {
            return $plugin->disable();
        }
        if ($status == 'uninstall') {
            return $plugin->uninstall();
        }
        if ($status == 'reset') {
            return $plugin->reset();
        }
        if ($status == 'active') {
            return $plugin->active();
        }
    }
}
