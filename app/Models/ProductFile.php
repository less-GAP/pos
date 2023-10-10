<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasRealtimeData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFile extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory, HasRealtimeData;

    protected $table = 'product_file';

    public $timestamps = true;

    protected $fillable = [
        'product_id',
        'file_path',
        'type',
        'is_primary',
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
        'file_url'
    ];

    public function getFileUrlAttribute()
    {
        return env('APP_URL') . '/' . $this->file_path;
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
