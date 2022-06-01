<?php

namespace App\Http\Controllers\Admin;

// use App\Helpers\ImageSaver;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Localization;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\SubCategory;
use App\Filters\ProductFilter;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // private $imageSaver;

    // public function __construct(ImageSaver $imageSaver)
    // {
    //     $this->imageSaver = $imageSaver;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::paginate(10);

        $productTypes = ProductType::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();


        return view('admin.product.index', [
            'products' => $products,
            'producttypes' => $productTypes,
            'categories' => $categories,
            'subcategories' => $subCategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $productType = ProductType::all();
        $subCategory = SubCategory::all();

        return view('admin.product.create', [
            'categories' => $category,
            'producttypes' => $productType,
            'subcategories' => $subCategory
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProductRequest $request)
    {

        $localization = new Localization();
        $localization->fill($request->validated());
        $localization->title_uk = $request->title_uk;
        $localization->title_ru = $request->title_ru;
        $localization->description_uk = $request->description_uk;
        $localization->description_ru = $request->description_ru;
        // dd($localization);

        $product = new Product();
        $product->fill($request->except(['categories', 'subcategories']));
        $product->save();
        $product->localization()->save($localization);

        //conect product to category
        $product->categories()->sync($request->categories);
        $product->subcategories()->sync($request->subcategories);

        // add info to images table in bd
        // $image = $this->imageSaver->upload($request->alt);
        // $product->image()->save($image);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $product->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.show', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.update', [
            'product' => $product,
            'categories' => $categories,
            'selected_categories' => $product->categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {

        $localization = [
            'title_uk' => $request->title_uk,
            'title_ru' => $request->title_ru,
            'description_uk' => $request->description_uk,
            'description_ru' => $request->description_ru
        ];

        $product->fill($request->except(['categories','subcategories', 'image', 'alt']));
        $product->update();
        $product->localization()->update($localization);

        //conect product to category
        $product->categories()->sync($request->categories);
        $product->subcategories()->sync($request->subcategories);

        // update info to images table in bd

        if (($request->hasFile('image')) == false) {
            $product->getMedia();
        } else {
            $product->clearMediaCollection('images');
            $product->addMediaFromRequest('image')
            ->usingFileName('product_photo.jpg')
            ->toMediaCollection('images');
        }

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        //
    }
}
