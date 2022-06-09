<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SizePrice;
use App\Models\ProductType;
use App\Models\SubCategory;

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
        $products = Product::paginate(12);

        $productTypes = ProductType::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        
        return view('site.product.index', [
            'products' => $products,
            'sizeprices' => SizePrice::getSizePrice(),
            'producttypes' => $productTypes,
            'categories' => $categories,
            'subcategories' => $subCategories,
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
