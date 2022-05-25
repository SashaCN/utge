<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductTypeRequest;
use App\Models\ProductType;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Localization;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTypes = ProductType::all();

        return view('admin.productType.index', ['productTypes' => $productTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductTypeRequest $request)
    {


        $localization = new Localization();
        $localization->fill($request->validated());
        $localization->title_uk = $request->title_uk;
        $localization->title_ru = $request->title_ru;
        $localization->description_uk = $request->description_uk;
        $localization->description_ru = $request->description_ru;

        $productType = new ProductType();
        $productType->fill($request->validated());

        $productType->save();
        $productType->localization()->save($localization);

        return redirect()->route('productType.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        // $categories = Category::all()->where('product_type_id', $productType->id);
        // $subCategories = SubCategory::all()->where('category_id', $categories->id);

        return view('admin.ProductType.show', [
            'productType' => $productType,
            // 'categories' => $categories,
            // 'subCategories' => $subCategories,
            // 'products' => $categories->products,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType)
    {
        return view('admin.productType.update', ['productType' => $productType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductTypeRequest $request, ProductType $productType)
    {
        $productType->update($request->validated());

        return redirect()->route('productType.show', $productType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {

    }

    public function delete(ProductType $productType)
    {
        $productType->delete();
        return redirect()->route('productType.index');
    }
}
