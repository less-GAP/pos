<?php

namespace Lessgap\Plugins;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Lessgap\Models\PluginData;

class LessgapPlugin
{

    public function __construct(private $name, private array $config)
    {
        $this->loadRoutes();
    }

    public function getData()
    {
        $data = PluginData::where('name', $this->name)->first();
        if (!$data) {
            $data = PluginData::create(['name' => $this->name]);
        }
        return $data;
    }

    public function toArray()
    {
        return [
            'config' => $this->config,
            'data' => $this->getData(),
        ];
    }

    public function reset()
    {

        $this->rollback();
        $this->migrate();
        $this->publish();
        return $this->getData();

    }

    public function disable()
    {
        $data = $this->getData();
        $data->update(['is_installed' => 1, 'status' => 'disable']);
        return $data;
    }
    public function active()
    {
        $data = $this->getData();
        $data->update(['is_installed' => 1, 'status' => 'active']);
        return $data;
    }

    public function uninstall()
    {
        $data = $this->getData();
        $this->rollback();
        $data->update(['is_installed' => 0, 'status' => 'disable']);
        return $data;
    }

    public function install()
    {
        $data = $this->getData();
        if ($data && $data->is_installed) {
            return $data;
        }
        $this->migrate();
        $this->publish();
        $data->update(['is_installed' => 1, 'status' => 'active']);
        return $data;
    }

    public function publish()
    {
        shell_exec("cp -r " . $this->getDir() . '/public/*' . " " . public_path('/plugins/' . strtolower($this->name)).'/');
    }

    public function getConfigs($prefix)
    {
        return $this->config[$prefix] ?? [];
    }

    public function getDir()
    {
        return base_path('/plugins/' . $this->name);
    }

    public function getRelativePath($path)
    {
        return '/plugins/' . $this->name . $path;
    }

    public function loadFile($path)
    {
        return file_get_contents($this->getDir() . '/' . $path);
    }

    public function getMenus($prefix)
    {
        $result = [];
        if (!empty($this->config[$prefix]) && is_array($this->config[$prefix]['menus'])) {
            $result = array_merge($result, $this->config[$prefix]['menus']);
        }
        return $result;
    }

    public function getRoutes($prefix)
    {
        $result = [];
        if (!empty($this->config[$prefix]) && is_array($this->config[$prefix]['routes'])) {
            $result = array_merge($result, $this->config[$prefix]['routes']);
        }
        return [strtolower($this->name) => $result];
    }

    public function detail($prefix)
    {
        if (!empty($this->config[$prefix]) && is_array($this->config[$prefix])) {
            return $this->config[$prefix];
        }
        return [];
    }

    public function getSideMenus($prefix)
    {
        $result = [];
        if (!empty($this->config[$prefix]) && is_array($this->config[$prefix]['sideMenus'])) {
            $result = array_merge($result, $this->config[$prefix]['sideMenus']);
        }
        return $result;
    }

    public function view($prefix, $name)
    {

        if (!($this->config[$prefix]['views'][$name] ?? null)) {
            return '';
        }
        $code = $this->loadFile($prefix . '/views/' . $this->config[$prefix]['views'][$name]);
        preg_match_all("#<template>(.+)?<\/template>#s", $code, $templates);
        preg_match_all("#<script>(.+)?<\/script>#s", $code, $scripts);
        return [
            'template' => $templates[1][0] ?? '',
            'script' => $scripts[1][0] ?? ''
        ];
    }

    public function migrate()
    {
        \Log::info("Migrated for plugin $this->name!");
        Artisan::call('migrate',
            array(
                '--path' => $this->getRelativePath('/migrations'),
                '--force' => true));

    }

    public function rollback()
    {
        Artisan::call('migrate:rollback',
            array(
                '--path' => $this->getRelativePath('/migrations'),
                '--force' => true));
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function loadRoutes()
    {
        if (is_file($this->getDir() . '/routes.php')) {
            Route::prefix('')
                ->group($this->getDir() . '/routes.php');
        }
    }
}
