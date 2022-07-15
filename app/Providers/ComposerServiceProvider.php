<?php

namespace App\Providers;

use App\Models\Seo;
use App\Models\Product;
use App\Models\ChildPage;
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
        View::composer('site.index', function($view){
            $view->with('logoImg',  ChildPage::all()->where('route', 'logo-img'));
        });
        View::composer('site.index', function($view){
            $view->with('logoName',  ChildPage::all()->where('route', 'logo-name'));
        });
        View::composer('site.index', function($view){
            $view->with('footerPlace',  ChildPage::all()->where('route', 'footer-place'));
        });
        View::composer('site.index', function($view){
            $view->with('email',  ChildPage::all()->where('route', 'email'));
        });
        View::composer('site.basket', function($view){
            $view->with('products',  Product::all());
        });

    }
}
