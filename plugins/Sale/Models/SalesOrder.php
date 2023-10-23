<?php

namespace Plugins\Sale\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasRealtimeData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plugins\Sale\Factories\SalesOrderFactory;

class SalesOrder extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory, HasFactory, HasRealtimeData;

    protected $table = 'sales_orders';

    public $timestamps = true;

    protected $fillable = [
        'customer_id',
        'company_id',
        'order_code',
        'order_status',
        'payment_status',
        'total_price',
        'total_paid',
        'sale_id',
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

    public function products()
    {
        return $this->belongsToMany(Product::class, 'sales_order_product', 'sale_orders_id', 'product_id','id','id');
    }
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return SalesOrderFactory::new();
    }
}
