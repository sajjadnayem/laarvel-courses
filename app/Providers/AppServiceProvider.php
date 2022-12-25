<?php

namespace App\Providers;

use App\Models\Platform;
use App\Models\Series;
use App\Models\Topic;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
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
        View::composer('layouts.guest', function ($view) {
            $view->with('series', Series::latest()->take(5)->get());
            $view->with('platforms', platform::latest()->take(5)->get());
            $view->with('topics', Topic::latest()->take(5)->get());
        });
    }
}
