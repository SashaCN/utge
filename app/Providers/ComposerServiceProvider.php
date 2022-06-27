<?php

namespace App\Providers;

use App\Models\ChildPage;
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

        View::composer('site.index', function($view){
            $view->with('phones',  ChildPage::all()->where('route', 'phone'));
        });

    }
}
