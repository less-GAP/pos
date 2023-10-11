<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Nhphero\Surreal\Eloquent\Model;

class PermissionGroup extends Model
{
    use HasFactory;

    protected $table = 'permission_groups';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'guard_name',
    ];

    public function items()
    {
        return $this->hasMany(Permission::class, 'group_id');
    }
}
