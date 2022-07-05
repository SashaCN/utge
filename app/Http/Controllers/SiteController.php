<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Product;
use App\Models\SizePrice;
use App\Models\ChildPage;
use App\Models\ServicesType;
use App\Filters\NewsFilter;
use Spatie\QueryBuilder\QueryBuilder;


class SiteController extends Controller
{
    
    public function index()
    {
        $products  = Product::all()->where('home_view', '1');
        $about_us = ChildPage::all()->where('route', 'about_us');
        $slider1 = ChildPage::all()->where('route', 'slider1');
        $slider2 = ChildPage::all()->where('route', 'slider2');
        $slider3 = ChildPage::all()->where('route', 'slider3');
        $slider4 = ChildPage::all()->where('route', 'slider4');

        return view('site.firstPage', [
            'products' => $products,
            'about_us' => $about_us,
            'slider1' => $slider1,
            'slider2' => $slider2,
            'slider3' => $slider3,
            'slider4' => $slider4,
        ]);
    }
    
    public function basket ()
    {
        $products = Product::all();

        return view('site.basket', [
            'products' => $products,
        ]);
    }

    public function showContacts()
    {
        $contacts = ChildPage::all()->where('route', 'contacts');

        return view('site.contacts', [
            'contacts' => $contacts,
        ]);

    }

    public function showDeliveryAndPay()
    {

        $deliveries = ChildPage::all()->where('route', 'delivery');
        $payments = ChildPage::all()->where('route', 'payment');
        $contacts = ChildPage::all()->where('route', 'contacts');

        return view('site.deliveryAndPay', [
            'deliveries' => $deliveries,
            'payments' => $payments,
        ]);
    }

    public function showNews(NewsFilter $request)
    {

        $news = News::filter($request)->paginate(4);
        $newsCategories = NewsCategory::all();
        $phones = ChildPage::all()->where('route', 'phone');

        return view('site.news', [
            'news' => $news,
            'newsCategories' => $newsCategories,
            'phones' => $phones,
        ]);

    }

    public function services ()
    {
        $services = ServicesType::all();

        return view('site.services', [
            'services' => $services,
        ]);
    }

}
