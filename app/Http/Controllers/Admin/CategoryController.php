<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Localization;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTypes = ProductType::all();

        return view('admin.category.create', ['productTypes' => $productTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

        $localization = new Localization();
        $localization->fill($request->validated());
        $localization->title_uk = $request->title_uk;
        $localization->title_ru = $request->title_ru;
        $localization->description_uk = $request->title_uk;
        $localization->description_ru = $request->title_ru;


        $category = new Category();
        $category->fill($request->validated());
        $category->product_type_id = $request->product_type_id;
        $category->save();
        $category->localization()->save($localization);


        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.show', [
            'category' => $category,
            'products' => $category->products,
            'subCategories' => SubCategory::all()->where('category_id', $category->id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $productTypes = ProductType::all();

        return view('admin.category.update', [
            'category' => $category,
            'productTypes' => $productTypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('category.show', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

    }

    public function delete(Category $category)
    {
        // dd($category);
        $category->delete();
        return redirect()->route('category.index');
    }
}
