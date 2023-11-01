<?php

namespace Lessgap;

use Lessgap\Plugins\LessgapPlugin;

class PluginManager
{
    public $plugins = [];

    public function active($name, $config)
    {
        $this->plugins[strtolower($name)] = new LessgapPlugin($name, $config);


    }

    public function loadPlugin($name)
    {
        $pluginDir = base_path('/plugins');
        $config = include($pluginDir . '/' . $name . '/index.php');
        return new LessgapPlugin($name, $config);
    }

    public function plugin($name)
    {
        return $this->plugins[strtolower($name)] ?? null;
    }

    public function getPlugins()
    {
        $result = [];
        foreach ($this->plugins as $plugin) {
            $result[] = $plugin->toArray();
        }
        return $result;
    }

    public function menus($prefix)
    {
        $result = [];
        foreach ($this->plugins as $plugin) {
            $result = array_merge($result, $plugin->getMenus($prefix));
        }
        return $result;
    }

    public function routes($prefix)
    {
        $result = [];

        foreach ($this->plugins as $plugin) {
            $result = array_merge($result, $plugin->getRoutes($prefix));
        }
        return $result;
    }


}
