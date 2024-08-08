<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model,
    Relations\BelongsTo,
    Relations\HasMany
};

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        // Event listener for creating a new category
        static::creating(function ($category) {
            $category->create_user_id = auth()->check() ? auth()->user()->id : 1;
            $category->update_user_id = null; // Set to null to avoid accidental updates
            $category->created_at     = now(); // Set "created_at" to current timestamp
            $category->updated_at     = null; // Set "updated_at" to null
        });

        // Event listener for updating an existing category
        static::updating(function ($category) {
            $category->update_user_id = auth()->check() ? auth()->user()->id : null;
            $category->timestamps = false; // temporarily disable auto-timestamp update
            $category->updated_at = now(); // Set "updated_at" to current timestamp
        });
    }

    // Relationships
    public function create_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_user_id', 'id');
    }

    public function update_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'update_user_id', 'id');
    }

    public function parentCategory(): HasMany
    {
        return $this->hasMany(Category::class, 'category_parent_id');
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_parent_id', 'id');
    }

    // public function products(): BelongsTo
    // {
    //     return $this->belongsTo(Category::class);
    // }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
