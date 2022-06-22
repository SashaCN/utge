<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicesType;
use Illuminate\Http\Request;
use App\Models\Localization;
use App\Models\Services;
use App\Http\Requests\MultiRequest;

class ServicesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServicesType $servicesTypes)
    {
        $servicesTypes = ServicesType::all();

        return view('admin.servicesType.index', [
            'servicesTypes' => $servicesTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servicesType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MultiRequest $request)
    {
        $localization_title = new Localization();
        $localization_title->fill($request->validated());
        $localization_title->var = 'title';
        $localization_title->uk = $request->title_uk;
        $localization_title->ru = $request->title_ru;

        $servicesTypes = new servicesType();
        $servicesTypes->save();

        $servicesTypes->localization()->save($localization_title);

        return redirect()->route('servicesTypes.index');
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
    public function edit(ServicesType $servicesType)
    {
        return view('admin.servicesType.update', [
            'servicesType' => $servicesType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MultiRequest $request, ServicesType $servicesType)
    {
        $localization_title = [
            'var' => "title",
            'uk' => $request->title_uk,
            'ru' => $request->title_ru,
        ];

        $servicesType->fill($request->validated());

        $servicesType->update();
        $servicesType->localization()->where('var', 'title')->update($localization_title);

        return redirect()->route('servicesTypes.index');
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

    public function delete(ServicesType $servicesType)
    {
        $servicesType->delete();
        return redirect()->route('servicesTypes.index');
    }
}
