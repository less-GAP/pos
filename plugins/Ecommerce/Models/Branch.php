<?php

namespace Plugins\Ecommerce\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\CreatedUpdatedByAdmin;
use App\Traits\HasRealtimeData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plugins\Sale\Factories\CategoryFactory;

class Branch extends Model
{
    use CreatedUpdatedByAdmin;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use  HasRealtimeData;

    protected $table = 'ecommerce_branch';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'image',
        'description',
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