<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MultiRequest;
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

        return view('admin.childPage.index', [
            'childPages' => $childPages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.childPage.create');
    }

    public function sliderCreate()
    {
        return view('admin.childPage.sliderCreate');
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

                if ($request->route == 'slider1' ||  $request->route == 'slider2' || $request->route == 'slider3' ||  $request->route == 'slider4') {
                    $localization_img_a_url = new Localization();
                    $localization_img_a_url->fill($request->validated());
                    $localization_img_a_url->var = 'img_a_url';
                    $localization_img_a_url->uk = $request->img_a_url;
                    $localization_img_a_url->ru = $request->img_a_url;
                    
                    $childPage->localization()->save($localization_img_a_url);
                }

                if ($request->route != 'logo-name' &&  $request->route != 'footer-place' && $request->route != 'slider1' &&  $request->route != 'slider2' && $request->route != 'slider3' &&  $request->route != 'slider4') {
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

        return redirect()->route('childPage.index');
    }

    public function mediaUpdate(ImageRequest $request, ChildPage $childPage)
    {
        if ($request->hasFile('image')) {
            $childPage->clearMediaCollection('images');
            $childPage->addMediaFromRequest('image')
            ->toMediaCollection('images');

        }
        return redirect()->back();
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

    public function sliderEdit($request)
    {
        $sliderImages = ChildPage::all()->where('route', $request);
        $sliderId = $request;
        return view('admin.childPage.sliderEdit', ['sliderImages' => $sliderImages, 'sliderId' => $sliderId]);
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

        if(isset($request->img_a_url))
        {
            $localization_img_a_url = [
                'var' => "img_a_url",
                'uk' => $request->img_a_url,
                'ru' => $request->img_a_url
            ];
        }

        $childPage->update($request->validated());
        $childPage->localization()->where('var', 'title')->update($localization_title);

        if(isset($request->description_uk) && isset($request->description_ru))
        {
            $childPage->localization()->where('var', 'description')->update($localization_desc);
        }

        if(isset($request->img_a_url))
        {
            $childPage->localization()->where('var', 'img_a_url')->update($localization_img_a_url);
        }
        if(isset($request->img_a_url))
        {
            return redirect()->back();
        } else {
            return redirect()->route('childPage.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildPage $childPage)
    {
        $childPage->delete();
        return redirect()->route('childPage.index');
    }
}
