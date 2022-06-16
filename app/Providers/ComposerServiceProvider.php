<?php

namespace App\Providers;

use App\Models\Seo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $seo = Seo::all();

        View::composer('admin.admin', function($view){
            $view->with('seo',  'sasha');
        });


        View::composer('site.news', function($view){

        });

        return view('admin.seo.index');
    }
}
