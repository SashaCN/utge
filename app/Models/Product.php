<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'description', 'article', 'shipable', 'available', 'max_order', 'list_position'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products', 'product_id', 'category_id');
    }
    public function image()
    {
        return $this->hasOne(Image::class);
    }
    public function price()
    {
        return $this->hasOne(Price::class);
    }
}
