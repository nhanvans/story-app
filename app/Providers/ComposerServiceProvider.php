<?php

namespace App\Providers;

use App\Models\Category;
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
        // Using closure based composers...
        View::composer(['front-ends.layouts.header', 'front-ends.layouts.footer'], function ($view) {
            $menuCategories = Category::get();
            $view->with([
                'menuCategories' => $menuCategories,
            ]);
        });
    }
}