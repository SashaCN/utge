<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MultiRequest;
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
        $productTypes = ProductType::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('admin.category.index', [
            'productTypes' => $productTypes,
            'categories' => $categories,
            'subCategories' => $subCategories,
        ]);
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
    public function store(MultiRequest $request)
    {
        $localization_title = new Localization();
        $localization_title->fill($request->validated());
        $localization_title->var = 'title';
        $localization_title->uk = $request->title_uk;
        $localization_title->ru = $request->title_ru;

        $localization_desc = new Localization();
        $localization_desc->fill($request->validated());
        $localization_desc->var = 'description';
        $localization_desc->uk = $request->description_uk;
        $localization_desc->ru = $request->description_ru;


        $category = new Category();
        $category->fill($request->validated());
        $category->product_type_id = $request->product_type_id;
        $category->save();

        $category->localization()->save($localization_title);
        $category->localization()->save($localization_desc);


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
    public function update(MultiRequest $request, Category $category)
    {
        $localization_title = [
            'var' => "title",
            'uk' => $request->title_uk,
            'ru' => $request->title_ru,
        ];

        $localization_desc = [
            'var' => "description",
            'uk' => $request->description_uk,
            'ru' => $request->description_ru
        ];



        $category->fill($request->validated());
        $category->product_type_id = $request->product_type_id;

        $category->update();
        $category->localization()->where('var', 'title')->update($localization_title);
        $category->localization()->where('var', 'description')->update($localization_desc);

        return redirect()->route('category.index');
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
        $category->delete();
        return redirect()->route('category.index');
    }
}
