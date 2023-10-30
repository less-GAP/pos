<?php

namespace Plugins\Sale\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Plugins\Sale\Factories\CustomerFactory;

class Customer extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory, HasApiTokens;

    protected $table = 'ecommerce_customers';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'email_verified_at',
        'status',
        'customer_group',
        'social_auth_id',
        'social_auth_type',
        'username',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
//        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        //'product_descr' => 'array',
    ];

    protected $appends = [
    ];


//    public function getImageUrlAttribute()
//    {
//        if ($this->image != '') {
//            return url('upload/' . $this->image, '', env('APP_ENV') == 'local' ? false : true);
//        }
//        return '';
//    }
    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return CustomerFactory::new();
    }
}
