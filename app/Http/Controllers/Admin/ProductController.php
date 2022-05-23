<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageSaver;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    private $imageSaver;

    public function __construct(ImageSaver $imageSaver)
    {
        $this->imageSaver = $imageSaver;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', [
            'products' => $products
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

        return view('admin.product.create', [
            'categories' => $category
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
        $product = new Product();
        $product->fill($request->except(['categories', 'image', 'alt']));
        $product->save();

        //conect product to category
        $product->categories()->sync($request->categories);

        // add info to images table in bd
        $image = $this->imageSaver->upload($request->alt);
        $product->image()->save($image);

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
        $product->fill($request->except(['categories', 'image', 'alt']));
        $product->update($request->validated());

        //conect product to category
        $product->categories()->sync($request->categories);

        // update info to images table in bd
        if (is_file($request->image)) {
            $this->imageSaver->update($product->image->id, $request->image, $request->alt);
        } else {
            $product->image()->save($product->image);
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
