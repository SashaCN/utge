<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'product_type_id'];

    public function productType ()
    {
        return $this->belongsTo(ProductType::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_products');
    }
}
