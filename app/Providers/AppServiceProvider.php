<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Advertisement;

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
    public function boot(): void
    {
        View::composer('*', function ($view) {
            // Получаем все категории и подкатегории
            $categories = Category::with(['subcategories', 'subcategories.advertisements' => function($query) {
                $query->where('is_active', 1);
            }])->get();

            // Получаем VIP объявления
            $vipAdvertisements = Advertisement::where('is_active', 1)
                                               ->whereNotNull('vip_level') // Убедитесь, что поле vip_level не пустое
                                               ->get()
                                               ->groupBy('vip_level');

            // Передаем данные во все представления
            $view->with('categories', $categories);
            $view->with('vipAdvertisements', $vipAdvertisements);
        });
    }
}
