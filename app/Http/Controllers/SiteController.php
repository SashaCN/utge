<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Product;
use App\Models\SizePrice;

class SiteController extends Controller
{
    
    public function index()
    {
        $products  = Product::all()->where('home_view', '1');
        $about_us = ChildPage::all()->where('route', 'about_us');
        
        return view('site.firstPage', [
            'products' => $products,
            'about_us' => $about_us,
        ]);
    }


    public function basket (){
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

    public function showNews(){
        $news = News::all();

        return view('site.news', [
            'news' => $news,
        ]);
    }

}
