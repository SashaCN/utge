<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChildPage;

class SiteController extends Controller
{
    public function index()
    {
        $childPages = ChildPage::all();
        return view('site.index', ['childPages' => $childPages]);
    }

    public function childPageRedirect(Request $request)
    {
        $route = $request->route()->parameters('route');
        $childPages = ChildPage::all();
        $childPage = $childPages->where('route', $route['route']);

        return view('site.childPage', ['childPage' => $childPage]);
    }
}
