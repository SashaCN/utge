<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function productType ()
    {
        return $this->belongsTo(ProductType::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_products');
    } 
}
