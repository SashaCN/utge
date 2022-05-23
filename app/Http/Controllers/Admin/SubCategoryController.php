<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::all();

        return view('admin.subCategory.index', ['subCategories' => $subCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Category::all();

        return view('admin.subCategory.create', ['Categories' => $Categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        $subCategory = new SubCategory();

        $subCategory->fill($request->validated());
        $subCategory->save();


        return redirect()->route('subCategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        return view('admin.subCategory.show', [
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
    public function edit(SubCategory $subCategory)
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
    public function update(SubCategoryRequest $request, SubCategory $subCategory)
    {
        $subCategory->update($request->validated());

        return redirect()->route('subCategory.show', $subCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return redirect()->route('subCategory.index');
    }
}
