<?php

namespace Plugins\Staff\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasRealtimeData;
use Illuminate\Database\Eloquent\Model;

class PlaceGroup extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use  HasRealtimeData;

    protected $table = 'staff_place_group';

    public $timestamps = false;

    protected $fillable = [
        'name',
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
//        'email_verified_at' => 'datetime',
//        'password' => 'hashed',
    ];

    protected $appends = [
    ];


}
