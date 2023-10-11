<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(PermissionGroup::class, 'group_id');
    }

}
