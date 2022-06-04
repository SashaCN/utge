<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SizePrice;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('site.product.index', [
            'products' => $products,
            'sizeprices' => SizePrice::getSizePrice(),
        ]);
    }

    public function show(Product $product)
    {
        $categories = Category::all();

        return view('site.product.show', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }
}
