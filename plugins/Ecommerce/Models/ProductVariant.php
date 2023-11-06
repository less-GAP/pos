<?php

namespace Plugins\Ecommerce\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasRealtimeData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plugins\Sale\Factories\ProductFileFactory;

class ProductVariant extends Model
{



    protected $table = 'ecommerce_product_variants';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'name',
        'value',
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



    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

}
