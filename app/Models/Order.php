<?php
// namespace App\Models;
// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Order extends Model
// {
//     use HasFactory;

//     protected $guarded = [];

//     protected static function boot()
//     {

//     }

//     public function items()
//     {
//         return $this->hasMany(OrderItem::class);
//     }
// }

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model,
    Relations\BelongsTo,
    Relations\HasMany
};

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->create_user_id =  auth()->check() ? auth()->user()->id : 1;
            $order->update_user_id = null;
            $order->created_at     = now();
            $order->updated_at     = null;
        });

        static::updating(function ($order) {
            $order->update_user_id = auth()->check() ? auth()->user()->id : null;
            $order->timestamps     = false;
            $order->updated_at     = now();
        });
    }

    // public function createUser()
    // {
    //     return $this->belongsTo(User::class, 'create_user_id');
    // }

    // Define the relationship with order items
    public function items()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function create_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_user_id', 'id');
    }

    public function update_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'update_user_id', 'id');
    }
}

