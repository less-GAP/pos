<?php

namespace Plugins\Staff\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\CreatedUpdatedByAdmin;
use App\Traits\HasRealtimeData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plugins\Sale\Factories\CategoryFactory;

class Place extends Model
{
    use CreatedUpdatedByAdmin;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use  HasRealtimeData;

    protected $table = 'staff_place';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'status',
        'group_id',
        'type',
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

    public function group()
    {
        return $this->belongsTo(PlaceGroup::class, 'group_id');
    }
}
