<?php


namespace App\Models;


class Permission extends \Spatie\Permission\Models\Permission
{
    public function group()
    {
        return $this->belongsTo(Permission::class, 'group_id');
    }

    public function items()
    {
        return $this->hasMany(Permission::class, 'group_id');
    }
}
