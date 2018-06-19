<?php

namespace App\Providers;

use App\Page;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::share('firstPageAdmin' , Page::first());
        View::share('secondPageAdmin' , Page::skip(1)->first());
        View::share('thirdPageAdmin' , Page::skip(2)->first());
        View::share('forthPageAdmin' , Page::skip(3)->first());
        View::share('fifthPageAdmin' , Page::skip(4)->first());
        View::share('active' , '');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
