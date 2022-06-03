<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChildPage;
use App\Models\News;
use App\Models\Product;

class SiteController extends Controller
{
    public function index()
    {
        $products  = Product::all()->where('home_view', '1');

        return view('site.firstPage', [
            'products' => $products
        ]);
    }

    public function childPageRedirect(Request $request)
    {
        $route = $request->route()->parameters('route');
        $childPages = ChildPage::all();
        $childPage = $childPages->where('route', $route['route']);

        dd($childPage);
        return view('site.childPage', ['childPage' => $childPage]);
    }

    public function showNews(){
        $news = News::all();
        return view('site.news', ['news' => $news]);
    }
}
