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
        $services = Services::orderBy('list_position')->paginate(12);

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

        $services->fill($request->except(['price/', 'units/ ', 'materials_uk/', 'materials_ru/', 'price_ru/']));
        $services->save();
        for($i = 1; $i <= $request->sizecount; $i++){
            $services_size_price = new ServicesSizePrice();
            $services_size_price->fill($request->validated());


            // $services_size_price->materials = $request->$materials;
            $price = 'price/'.$i;
            $units = 'units/'.$i;
            $price_ru = 'price_ru/'.$i;
            $services_size_price->price = $request->$price;
            $services_size_price->units = $request->$units;
            $services_size_price->price_ru = $request->$price_ru;
            $services->localization()->save($localization_title);

            $services->ServicesSizePrice()->save($services_size_price);

            $localization_materials = new Localization();
            $localization_materials->fill($request->validated());
            $localization_materials->var = 'materials';
            $mat_uk = 'materials_uk/'.$i;
            $mat_ru = 'materials_ru/'.$i;
            $localization_materials->uk = $request->$mat_uk;
            $localization_materials->ru = $request->$mat_ru;
            $services->localization()->save($localization_materials);
        }

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
    public function update(MultiRequest $request, Services $service)
    {
        $localization_title = [
            'var' => 'title',
            'uk' => $request->title_uk,
            'ru' => $request->title_ru
        ];

        $localization_maerials = [
            'var' => 'materials',
            'uk' => $request->materials_uk,
            'ru' => $request->materials_ru
        ];

        $service->fill($request->except(['materials.', 'price.', 'units.']));
        $service->update();

        foreach ($service->localization->where('var', 'materials') as $material) {
            $material->delete();
        }

        foreach ($service->servicesSizePrice as $size) {
            $size->delete();
        }


        for($i = 1; $i <= $request->sizecount; $i++){
            $services_size_price = new ServicesSizePrice();
            $services_size_price->fill($request->validated());

            $price = 'price/'.$i;
            $units = 'units/'.$i;
            $price_ru = 'price_ru/'.$i;
            $services_size_price->price = $request->$price;
            $services_size_price->units = $request->$units;
            $services_size_price->price_ru = $request->$price_ru;

            $service->ServicesSizePrice()->save($services_size_price);
        }

        for ($i = 1; $i <= $request->sizecount; $i++){
            $localization_materials = new Localization();
            $localization_materials->fill($request->validated());
            $localization_materials->var = 'materials';
            $mat_uk = 'materials_uk/'.$i;
            $mat_ru = 'materials_ru/'.$i;
            $localization_materials->uk = $request->$mat_uk;
            $localization_materials->ru = $request->$mat_ru;

            $service->localization()->save($localization_materials);
        }

        $service->localization()->where('var', 'title')->update($localization_title);
        // $service->localization()->where('var', 'materials')->update($localization_maerials);

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
