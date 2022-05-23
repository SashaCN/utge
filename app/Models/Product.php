<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'description', 'article', 'shipable', 'price', 'available', 'max_order', 'list_position'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }
    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class, 'product_sub_categories', 'product_id', 'sub_category_id');
    }
    public function image()
    {
        return $this->hasOne(Image::class);
    }
}
