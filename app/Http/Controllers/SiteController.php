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
use App\Models\Services;
use App\Models\ServicesCategory;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Requests\MultiRequest;
use App\Http\Requests\StoreServicesOrderRequest;
use App\Models\ServicesOrder;
use Illuminate\Auth\Events\Validated;

class SiteController extends Controller
{

    public function index()
    {

        return view('site.firstPage', [
            'products' => Product::all()->where('home_view', '1'),
            'about_us' => ChildPage::all()->where('route', 'about_us'),
            // 'slider1' => ChildPage::orderSlider(),
            'slider1' => ChildPage::where('route', 'slider1')->orderBy('order')->get(),
            'slider2' => ChildPage::where('route', 'slider2')->orderBy('order')->get(),
            'slider3' => ChildPage::where('route', 'slider3')->orderBy('order')->get(),
            'slider4' => ChildPage::where('route', 'slider4')->orderBy('order')->get(),
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

    public function services()
    {
        $services = ServicesType::all();

        return view('site.services', [
            'services' => $services,
        ]);

    }

    public function service(ServicesType $id)
    {
        $types = ServicesType::all()->where('id', $id->id);
        $categories = ServicesCategory::all()->where('service_type_id', $id->id);
        $services = Services::all();

        return view('site.services.index', [

            'categories' => $categories,
            'services' => $services,
            'types' => $types,

        ]);
    }

    public function storeServiceOrder(StoreServicesOrderRequest $request)
    {


        $serviceOrder = new ServicesOrder();
        $validated = $request->validated();
        $serviceOrder->firstname = $request->firstname;
        $serviceOrder->lastname = $request->lastname;
        $serviceOrder->phone = $request->phone;
        $serviceOrder->email = $request->email;
        $serviceOrder->interes = $request->interes;
        $serviceOrder->status = '0';
        $serviceOrder->fill($request->validated());
        $serviceOrder->save();

        return redirect()->back();
    }

}
