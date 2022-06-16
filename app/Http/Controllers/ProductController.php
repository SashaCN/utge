<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SizePrice;
use App\Models\ProductType;
use App\Models\SubCategory;
use App\Models\Filter;
use App\Models\ChildPage;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filters\ProductFilter;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ProductFilter $request)
    {
        $products = Product::filter($request)->paginate(12);

        $productTypes = ProductType::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $phones = ChildPage::all()->where('route', 'phone');

        return view('site.product.index', [
            'products' => $products,
            'sizeprices' => SizePrice::getSizePrice(),
            'producttypes' => $productTypes,
            'categories' => $categories,
            'subcategories' => $subCategories,
            'phones' => $phones,
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
