<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ProductsOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['product_id', 'size', 'price', 'quantity', 'status'];

    public function product()
    {
        return $this->hasMany(Product::class, 'product_id');
    }
    public function customers()
    {
        return $this->hasOne(Customers::class);
    }

    static function getProduct($id)
    {
        return DB::table('products')
                ->leftJoin('products_orders', 'product_id', '=', 'products.id')
                ->select('products.id')
                ->where('products_orders.product_id', $id)
                ->get();
    }
}
