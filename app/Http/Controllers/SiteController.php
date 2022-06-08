<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChildPage;
use App\Models\News;
use App\Models\Product;
use App\Models\SizePrice;

class SiteController extends Controller
{
    public function index()
    {
        $products  = Product::where('home_view', '1')->paginate(4);

        return view('site.firstPage', [
            'products' => $products,
        ]);
    }

    public function childPageRedirect(Request $request)
    {
        $route = $request->route()->parameters('route');
        $childPages = ChildPage::all();

        if ($route['route'] == "delivery") {
            $childPageDelivery = $childPages->where('route', 'delivery');
            $childPagePayment = $childPages->where('route', 'payment');

            return view('site.childPage', ['deliveries' => $childPageDelivery, 'payments' => $childPagePayment, 'rout' => $route['route']]);
        }

        if ($route['route'] == "contacts") {
            $childPage = $childPages->where('route', $route['route']);
            return view('site.childPage', ['contacts' => $childPage, 'rout' => $route['route']]);
        }

    }

    public function showNews(){
        $news = News::all();
        return view('site.news', ['news' => $news]);
    }
}
