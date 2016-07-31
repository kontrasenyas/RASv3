<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\CarType;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeSearch();
        $this->carTypeForProduct();
        $this->carTypeForLayout();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composeSearch()
    {
        view()->composer('partials.search', function($view)

        {
            $CarType = CarType::orderBy('CarType')->pluck('CarType', 'CarType');
            $view->with('CarType', $CarType);
        });
    }
    private function carTypeForProduct()
    {
        view()->composer('products.create', function($view)

        {
            $CarType = CarType::orderBy('CarType')->pluck('CarType', 'CarType');
            $view->with('CarType', $CarType);
        });
    }
    private function carTypeForLayout()
    {
        view()->composer('layouts.app', function($view)

        {
            $CarType = CarType::orderBy('CarType')->pluck('CarType', 'CarType');
            $view->with('CarType', $CarType);
        });
    }
}
