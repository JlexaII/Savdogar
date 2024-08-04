<?php

// app/Http/Middleware/SidebarNewsMiddleware.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\Models\News;

class SidebarNewsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Получаем последние новости для боковой панели
        $sidebarNews = News::latest()->take(5)->get();

        // Делаем данные доступными для всех представлений
        View::share('sidebarNews', $sidebarNews);

        return $next($request);
    }
}
