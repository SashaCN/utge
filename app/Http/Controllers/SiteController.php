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
        $products  = Product::all()->where('home_view', '1');
        $about_us = ChildPage::all()->where('route', 'about_us');
        $phones = ChildPage::all()->where('route', 'phone');

        return view('site.firstPage', [
            'products' => $products,
            'about_us' => $about_us,
            'phones' => $phones,
        ]);
    }

    public function headerFooter()
    {
        $phones = ChildPage::all()->where('route', 'phone');

        return view('site.index', [
            'phones' => $phones,
        ]);
    }

    public function basket (){
        $products = Product::all();
        $phones = ChildPage::all()->where('route', 'phone');

        return view('site.basket', [
            'products' => $products,
            'phones' => $phones
        ]);
    }

    public function showContacts()
    {
        $contacts = ChildPage::all()->where('route', 'contacts');
        $phones = ChildPage::all()->where('route', 'phone');

        return view('site.contacts', [
            'contacts' => $contacts,
            'phones' => $phones,
        ]);

    }

    public function showDeliveryAndPay()
    {

        $deliveries = ChildPage::all()->where('route', 'delivery');
        $payments = ChildPage::all()->where('route', 'payment');
        $contacts = ChildPage::all()->where('route', 'contacts');
        $phones = ChildPage::all()->where('route', 'phone');

        return view('site.deliveryAndPay', [
            'deliveries' => $deliveries,
            'payments' => $payments,
            'phones' => $phones,
        ]);
    }

    public function showNews(){
        $news = News::all();
        $phones = ChildPage::all()->where('route', 'phone');

        return view('site.news', [
            'news' => $news,
            'phones' => $phones,
        ]);
    }

}
