<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Advertisement; // Убедитесь, что модель импортирована
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Получаем последние объявления
        $advertisements = Advertisement::where('is_active', true)->latest()->paginate(12);

        // Передаем переменную в представление
        return view('home', [
            'advertisements' => $advertisements
        ]);
    }
}
