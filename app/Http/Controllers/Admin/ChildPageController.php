<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MultiRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use App\Models\Localization;
use App\Models\ChildPage;

class ChildPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childPages = ChildPage::all();
        $sliders = ChildPage::where('route', 'like', 'slider%')->orderBy('slider_order')->get();
        $slidersName = [];
        
        foreach ($sliders as $slider) {
            
            if (in_array($slider->route, $slidersName))
            {
                continue;
            }
            else
            {
                $slidersName[$slider->route] = $slider->slider_order;
            }
        }
       
        return view('admin.childPage.index', [
            'childPages' => $childPages,
            'sliders' => $slidersName,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $childPages = ChildPage::all();
        $sliders = ChildPage::where('route', 'like', 'slider%')->get();
        $slidersName = [];
        
        foreach ($sliders as $slider) {
            
            if (in_array($slider->route, $slidersName))
            {
                continue;
            }
            else
            {
                array_push($slidersName, $slider->route);
            }
        }
            
        sort($slidersName);

        return view('admin.childPage.create', [
            'childPages' => $childPages,
            'slidersName' => $slidersName,
        ]);
    }

    public function sliderCreate()
    {
        $sliders = ChildPage::where('route', 'like', 'slider%')->orderBy('slider_order')->get();
        $slidersName = [];

        foreach ($sliders as $slider) {
            
            if (in_array($slider->route, $slidersName))
            {
                continue;
            }
            else
            {
                array_push($slidersName, $slider->route);
            }
        }

        return view('admin.childPage.sliderCreate', [
            'sliders' => $slidersName,
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
        $childPage = new ChildPage();
        $childPage->fill($request->validated());

        if (isset($request->slider_order)) {
            $childPage->order = $request->slider_order;
            
        } else {
            $childPage->order = 0;
        }

        if (substr($request->route, 0, 6) == 'slider') {
            $sliders = ChildPage::where('route', $request->route)->get();
            $slider_order = ChildPage::where('route', 'like', 'slider%')->orderBy('slider_order')->get();


            if(isset($sliders[0]) && !empty($sliders[0]))
            {
                foreach ($sliders as $slider) {
                    $childPage->slider_order = $slider->slider_order;
                    break;
                }
            }else
            {
                $childPage->slider_order = $slider_order[count($slider_order) - 1]->slider_order + 1;
            }
        }

        $childPage->save();

        if ($request->route != 'logo-img')
        {
            if($request->route != 'phone' && $request->route != 'email')
            {
                $localization_title = new Localization();
                $localization_title->fill($request->validated());
                $localization_title->var = 'title';
                $localization_title->uk = $request->title_uk;
                $localization_title->ru = $request->title_ru;

                $childPage->localization()->save($localization_title);
                
                if (substr($request->route, 0, 6) == 'slider') {

                    $localization_slider_link = new Localization();
                    $localization_slider_link->fill($request->validated());
                    $localization_slider_link->var = 'slider_link';
                    $localization_slider_link->uk = preg_replace('#(https?:\/\/)#', '', $request->slider_link);
                    $localization_slider_link->ru = preg_replace('#(https?:\/\/)#', '', $request->slider_link);

                    $childPage->localization()->save($localization_slider_link);
                }

                if ($request->route != 'logo-name' &&  $request->route != 'footer-place' && substr($request->route, 0, 6) != 'slider') {
                    $localization_desc = new Localization();
                    $localization_desc->fill($request->validated());
                    $localization_desc->var = 'description';
                    $localization_desc->uk = $request->description_uk;
                    $localization_desc->ru = $request->description_ru;

                    $childPage->localization()->save($localization_desc);
                }

            } else {

                $localization_title = new Localization();
                $localization_title->fill($request->validated());
                $localization_title->var = 'title';

                if (isset($request->phone)) {
                    $localization_title->uk = $request->phone;
                    $localization_title->ru = $request->phone;
                }

                if (isset($request->email)) {
                    $localization_title->uk = $request->email;
                    $localization_title->ru = $request->email;
                }

                $childPage->localization()->save($localization_title);
            }
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $childPage->addMediaFromRequest('image')
            ->toMediaCollection('images');
        }

        if ($request->hasFile('pdf') && $request->file('pdf')->isValid()) {
            $childPage->addMediaFromRequest('pdf')
            ->toMediaCollection('pdf');
        }

        return redirect()->route('childPage.index');
    }

    public function mediaUpdate(ImageRequest $request, ChildPage $childPage)
    {
        if ($request->hasFile('image')) {
            $childPage->clearMediaCollection('images');
            $childPage->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return redirect()->back();
    }
    public function mediaUpdatePdf(ImageRequest $request, СhildPage $childPage)
    {
        if ($request->hasFile('pdf')) {

            $childPage->clearMediaCollection('pdf');
            $childPage->addMediaFromRequest('pdf')
            ->toMediaCollection('pdf');
        }
        return redirect()->route('childPage.edit', $childPage->id);
    }
    public function mediaDeletePdf(СhildPage $childPage)
    {
        $childPage->clearMediaCollection('pdf');
        return redirect()->route('childPage.edit', $childPage->id);
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
    public function edit(ChildPage $childPage)
    {
        return view('admin.childPage.update', ['childPage' => $childPage]);
    }

    public function sliderEdit(Request $request)
    {
        $sliderCount = $request->sliderCount;
        $sliders = ChildPage::all()->where('route', $request->slider_id)->sortBy('order');

        return view('admin.childPage.sliderEdit', [
            'sliders' => $sliders, 
            'sliderCount' => $sliderCount,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MultiRequest $request, ChildPage $childPage)
    {
        // dd();

        $localization_title = [
            'var' => "title",
            'uk' => $request->title_uk,
            'ru' => $request->title_ru,
        ];

        if(isset($request->description_uk) && isset($request->description_ru))
        {
            $localization_desc = [
                'var' => "description",
                'uk' => $request->description_uk,
                'ru' => $request->description_ru
            ];
        }

        if(isset($request->slider_link))
        {
            $localization_slider_link = [
                'var' => "slider_link",
                'uk' => preg_replace('#(https?:\/\/)#', '', $request->slider_link),
                'ru' => preg_replace('#(https?:\/\/)#', '', $request->slider_link)
            ];
        }

        if (isset($request->slide_order)) {
            $childPage->order = $request->slide_order;
        }

        $childPage->update($request->validated());

        $childPage->localization()->where('var', 'title')->update($localization_title);

        if(isset($request->description_uk) && isset($request->description_ru))
        {
            $childPage->localization()->where('var', 'description')->update($localization_desc);
        }

        if(isset($request->slider_link))
        {
            $childPage->localization()->where('var', 'slider_link')->update($localization_slider_link);

        }

        if(isset($request->slider_link))
        {
            return redirect()->back();
        } else {
            return redirect()->route('childPage.index');
        }
    }

    public function updateSliderOrder(Request $request)
    {
        $sliders = ChildPage::where('route', $request->slider_id)->get();

        foreach ($sliders as $slider) {
            $slider->slider_order = $request->slider_order;
            $slider->update();
        }

        return redirect()->route('childPage.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildPage $childPage)
    {
        $childPage->forceDelete();
        return redirect()->route('childPage.index');
    }

    public function delete(ChildPage $childPage)
    {
        $childPage->forceDelete();

        return redirect()->route('childPage.index');
    }
}
