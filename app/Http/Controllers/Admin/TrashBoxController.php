<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SizePrice;
use App\Models\Product;
use App\Models\ServicesType;
use App\Models\ServicesCategory;
use App\Models\ServicesSizePrice;
use App\Models\Services;

class TrashBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $products)
    {
        $products = Product::onlyTrashed()->get();
        $productTypes = ProductType::onlyTrashed();
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('admin.trashBox.index', [
            'products' => $products,
            'producttypes' => $productTypes,
            'categories' => $categories,
            'subcategories' => $subCategories,
        ]);
    }

    public function serviceIndex(Services $services)
    {
        $services = Services::onlyTrashed()->get();
        $servicesTypes = ServicesType::onlyTrashed();
        $categories = ServicesCategory::all();
        $subCategories = SubCategory::all();

        return view('admin.trashBox.service', [
            'servicesTypes' => $servicesTypes,
            'categories' => $categories,
            'subcategories' => $subCategories,
            'services' => $services,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function restore(Product $product, SizePrice $sizePrice, $id)
    {

        $product = Product::onlyTrashed()->findOrFail($id);
        $sizePrice = SizePrice::onlyTrashed()->where('product_id', $id);

        $sizePrice->restore();
        $product->restore();

        return back();

    }

    public function serviceRestore(Services $service, ServicesSizePrice $sizePrice, $id)
    {

        $service = Services::onlyTrashed()->findOrFail($id);

        $service->restore();
        $service->servicessizeprice()->restore();

        return back();

    }

    public function productForceDelete(Product $product, SizePrice $sizePrice, $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $sizePrice = SizePrice::onlyTrashed()->where('product_id', $id);

        $sizePrice->forceDelete();
        $product->forceDelete();

        return back();
    }

    public function servicesForceDelete(Services $service, ServicesSizePrice $sizePrice, $id)
    {
        $service = Services::onlyTrashed()->findOrFail($id);
        $sizePrice = ServicesSizePrice::onlyTrashed()->where('service_id', $id);

        $sizePrice->forceDelete();
        $service->forceDelete();

        return back();
    }
}
