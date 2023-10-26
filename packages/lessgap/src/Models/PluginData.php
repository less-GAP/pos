<?php


namespace Lessgap\Models;


use Illuminate\Database\Eloquent\Model;

class PluginData extends Model
{

    protected $table = 'plugins';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'status',
        'is_installed',
        'config',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
//        'password',
//        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'config' => 'array',
    ];

    protected $appends = [
    ];


}
