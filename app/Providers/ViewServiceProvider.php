<?php

namespace App\Providers;

use App\View\Composers\CategoriesComposer;
use Illuminate\Support\ServiceProvider;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layout.*', 'main.*'], CategoriesComposer::class);
    }
}
