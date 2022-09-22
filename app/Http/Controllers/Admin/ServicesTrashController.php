<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicesType;
use App\Models\ServicesCategory;
use App\Models\SubCategory; //
use App\Models\Services;
use App\Models\ServicesSizePrice;

class ServicesTrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Services $services)
    {
        $services = Services::onlyTrashed()->paginate(12);

        $servicesTypes = ServicesType::onlyTrashed();
        $categories = ServicesCategory::all();
        $subCategories = SubCategory::all();

        return view('admin.servicesTrash.index', [
            'servicesTypes' => $servicesTypes,
            'categories' => $categories,
            'subcategories' => $subCategories,
            'services' => $services,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function restore(Services $service, ServicesSizePrice $sizePrice, $id)
    {

        $service = Services::onlyTrashed()->findOrFail($id);
        $sizePrice = ServicesSizePrice::onlyTrashed()->where('service_id', $id);

        dd($service->servicessizeprice);
        $service->restore();
        $sizePrice->restore();

        return back();

    }

    public function servicesForceDelete(Services $service, ServicesSizePrice $sizePrice, $id)
    {
        $service = Services::onlyTrashed()->findOrFail($id);
        $sizePrice = ServicesSizePrice::onlyTrashed()->where('service_id', $id);

        $sizePrice->forceDelete();
        $service->forceDelete();

        return back();
    }
}
