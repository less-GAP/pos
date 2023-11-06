<?php

namespace Plugins\Ecommerce\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\File;
use App\Traits\HasImages;
use App\Traits\HasRealtimeData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plugins\Sale\Factories\ProductFactory;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory, HasRealtimeData;

    protected $table = 'ecommerce_products';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'type',
        'category_id',
        'brand_id',
        'sku',
        'quantity',
        'stock',
        'cost_price',
        'sell_price',
        'status',
        'unit',
        'note',
        'product_code',
        'short_description',
        'description',
        'created_by',
        'updated_by'
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
        'image_url'
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image != '') {
            return url($this->image, '', env('APP_ENV') == 'local' ? false : true);
        }
        return '';
    }

    public function images()
    {
        return $this->belongsToMany(File::class, 'ecommerce_product_file', 'file_id', 'product_id');
    }

    public function places()
    {
        return $this->belongsToMany(Taxonomy::class, 'ecommerce_product_taxonomy', 'taxonomy_id', 'product_id');
    }

    public function cost_items()
    {
        return $this->belongsToMany(Product::class, 'ecommerce_product_cost_items', 'item_id', 'product_id')
            ->where('item_class', Product::class)
            ->orderByDesc('id')
            ->withPivot('quantity');
    }

    public function saveCost_items($items)
    {
        if (!is_array($items)) {
            return;
        }

        $data = [];
        foreach ($items as $item) {
            $data[$item['id']] = [
                'quantity' => $item['pivot']['quantity'],
                'item_class' => Product::class
            ];
        }
        $this->cost_items()->sync($data);
        return $this->load('cost_items','cost_items.images');
    }

    public function savePlaces($data)
    {
        if (!is_array($data)) {
            return;
        }

        $ids = [];
        foreach ($data as $item) {
            $ids[] = $item['id'];
        }
        $this->places()->sync($ids);
        return $this->load('places');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function saveVariants($data)
    {
        $ids = [];
        foreach ($data as $variant) {
            $model = ProductVariant::updateOrCreate([
                'value' => $variant['value']
            ], ['name' => $variant['name']
                , 'product_id' => $this->id
            ]);
            $ids[] = $model->id;
        }
        ProductVariant::whereNotIn('id', $ids)->delete();
        return $this->load('variants');
    }

    public function files()
    {
        return $this->hasMany(ProductFile::class, 'product_id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    public function saveImages($files)
    {
        if (!is_array($files)) {
            return;
        }

        $data = [];
        foreach ($files as $file) {
            $data[] = $file['id'];
        }
        $this->images()->sync($data);
        return $this->load('images');
    }

}
