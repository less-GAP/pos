<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasRealtimeData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory, HasFactory, HasRealtimeData;

    protected $table = 'categories';

    public $timestamps = true;

    protected $fillable = [
        'name',
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
