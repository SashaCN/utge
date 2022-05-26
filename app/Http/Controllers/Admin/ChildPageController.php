<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChildPageRequest;
use Illuminate\Http\Request;
use App\Models\ChildPage;
use App\Models\Localization;


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

        return view('admin.childPage.index', ['childPages' => $childPages]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChildPageRequest $request)
    {

        // $localization = new Localization();
        // $localization->fill($request->validated());
        // $localization->title_uk = $request->title_uk;
        // $localization->title_ru = $request->title_ru;
        // $localization->description_uk = $request->description_uk;
        // $localization->description_ru = $request->description_ru;
        // dd($request);
        $childPage = new ChildPage();
        $childPage->fill($request->validated());
        // $childPage->$product->localization()->save($localization);
        $childPage->save();
        
        return redirect()->route('childPage.index');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChildPageRequest $request, ChildPage $childPage)
    {
        $childPage->update($request->validated());

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
        $childPage->delete();
        return redirect()->route('childPage.index');
    }
}
