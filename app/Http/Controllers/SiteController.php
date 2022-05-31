<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChildPage;
use App\Models\News;

class SiteController extends Controller
{
    public function index()
    {
        // $childPages = ChildPage::all();
        return view('site.firstPage');
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
