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
    protected $fillable = ['firstname', 'lastname', 'phone', 'city', 'adress_delivery', 'delivery_type', 'product_id', 'size', 'price', 'quantity', 'payment_type', 'products_orders', 'status'];


    public static function orderByProduct()
    {
        return DB::table('products_orders')->select('*')->orderBy('status', 'asc' ,'deleted_at', 'NULL')->get();

    }
}
