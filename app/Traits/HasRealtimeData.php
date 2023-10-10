<?php


namespace App\Traits;


use Lessgap\Services\RealtimeService;

trait HasRealtimeData
{
    public static function bootHasRealtimeData()
    {
        static::saved(function ($model) {
            app(RealtimeService::class)->updateTableValue('versions', $model->getTable());
        });
        static::created(function ($model) {
            app(RealtimeService::class)->updateTableValue('statistics', $model->getTable() . '_count', static::count());
        });
        static::deleted(function ($model) {
            app(RealtimeService::class)->updateTableValue('statistics', $model->getTable() . '_count', static::count());
        });
    }
}
