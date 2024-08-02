<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Добавьте это
use App\Models\Category; // Добавьте это

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void // Исправьте сигнатуру метода на void
    {
        View::composer('*', function ($view) {
            $categories = Category::with('subcategories')->get();
            $view->with('categories', $categories);
        });
    }
}
