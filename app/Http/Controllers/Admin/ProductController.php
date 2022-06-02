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
use App\Http\Requests\ImageRequest;
use App\Models\CategoryProduct;
use App\Models\SizePrice;
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

        $sizeprices = SizePrice::all();
        $productTypes = ProductType::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();


        return view('admin.product.index', [
            'products' => $products,
            'producttypes' => $productTypes,
            'categories' => $categories,
            'subcategories' => $subCategories,
            'sizeprices' => $sizeprices,
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

        $size_price = new SizePrice();
        $size_price->fill($request->validated());
        $size_price->size = $request->size;
        $size_price->price = $request->price;

        $product = new Product();
        $product->fill($request->except(['size', 'price']));
        $product->save();

        $product->localization()->save($localization_title);
        $product->localization()->save($localization_desc);
        $product->sizePrices()->save($size_price);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $product->addMediaFromRequest('image')
            ->toMediaCollection('images');
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
            'sizeprices' => SizePrice::getSizePrice(),
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


        return redirect()->route('product.index');
    }

    public function mediaUpdate(ImageRequest $request, Product $product)
    {
        if ($request->hasFile('image')) {

            $product->clearMediaCollection('images');
            $product->addMediaFromRequest('image')
            ->toMediaCollection('images');

        }

        return redirect()->route('product.edit', $product->id);
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
