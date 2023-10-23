<?php

namespace Lessgap;

use Lessgap\Plugins\LessgapPlugin;

class PluginManager
{
    public $plugins = [];

    public function add($name, $config)
    {
        $this->plugins[strtolower($name)] = new LessgapPlugin($name, $config);
    }

    public function plugin($name)
    {
        return $this->plugins[strtolower($name)] ?? null;
    }

    public function getPlugins()
    {
        return $this->plugins;
    }

    public function menus($prefix)
    {
        $result = [];

        foreach ($this->plugins as $plugin) {
            $result = $plugin->getMenus($prefix);
        }
        return $result;
    }
    public function routes($prefix)
    {
        $result = [];

        foreach ($this->plugins as $plugin) {
            $result = $plugin->getRoutes($prefix);
        }
        return $result;
    }


}
