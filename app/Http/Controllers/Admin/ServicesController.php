<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\ServicesCategory;
use App\Models\Localization;
use App\Http\Requests\MultiRequest;
use App\Models\ServicesSizePrice;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::paginate(12);


        return view('admin.services.index', [
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
        $servicesCategories = ServicesCategory::all();


        return view('admin.services.create', [
            'servicesCategories' => $servicesCategories,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MultiRequest $request)
    {
        $services = new Services();

        $localization_title = new Localization();
        $localization_title->fill($request->validated());
        $localization_title->var = 'title';
        $localization_title->uk = $request->title_uk;
        $localization_title->ru = $request->title_ru;

        $services->fill($request->except(['materials/', 'price/', 'units/ ']));
        $services->save();

        for($i = 1; $i <= $request->sizecount; $i++){
            $services_size_price = new ServicesSizePrice();
            $services_size_price->fill($request->validated());
            $materials = 'materials/'.$i;
            $price = 'price/'.$i;
            $units = 'units/'.$i;
            $services_size_price->materials = $request->$materials;
            $services_size_price->price = $request->$price;
            $services_size_price->units = $request->$units;

            $services->ServicesSizePrice()->save($services_size_price);
        }

        $services->localization()->save($localization_title);

        return redirect()->route('services.index');
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
    public function edit(Services $service)
    {
        $servicescategories = ServicesCategory::all();

        return view('admin.services.update', [
            'service' => $service,
            'servicescategories' => $servicescategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $service)
    {
        $localization_title = [
            'var' => 'title',
            'uk' => $request->title_uk,
            'ru' => $request->title_ru
        ];

        $service->fill($request->except(['materials.', 'price.', 'units.']));
        $service->update();

        for($i = 1; $i <= $request->counter; $i++){
            $materials = 'materials/'.$i;
            $price = 'price/'.$i;
            $units = 'units/'.$i;
            $services_size_price =[
                'materials' => $request->$materials,
                'price' => $request->$price,
                'units' => $request->$units
            ];

            $service->servicesSizePrice[$i-1]->update($services_size_price);
        }

        $service->localization()->where('var', 'title')->update($localization_title);

        return redirect()->route('services.index');

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

    public function delete(Services $services)
    {
        $services->delete();

        return redirect()->route('services.index');
    }
}
