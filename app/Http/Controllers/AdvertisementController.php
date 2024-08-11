<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    // Отображение списка объявлений текущего пользователя
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $advertisements = Advertisement::where('user_id', $user->id)->get();
            $categoryId = 1; // Установите ID категории или получите его из запроса
            return view('advertisements.index', [
                'advertisements' => $advertisements,
                'categoryId' => $categoryId
            ]);
        } else {
            return redirect()->route('login')->with('error', 'Вы должны быть аутентифицированы для доступа к этой странице.');
        }
    }

    // Форма для создания нового объявления
    public function create($categoryId)
    {
        $category = Category::with('subcategories')->findOrFail($categoryId);
        return view('advertisements.create', compact('category'));
    }

    // Метод для отображения объявлений текущего пользователя
    public function userAdvertisements()
    {
        $user = Auth::user();

        if ($user) {
            $advertisements = Advertisement::where('user_id', $user->id)->get();
            return view('advertisements.index', compact('advertisements'));
        } else {
            return redirect()->route('login')->with('error', 'Вы должны быть аутентифицированы для доступа к этой странице.');
        }
    }

    // Сохранение нового объявления
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'phone' => 'required|string|max:20',
            'square_meters' => 'nullable|numeric',
            'car_description' => 'nullable|string|max:255',
            'subcategory_id' => 'required|exists:subcategories,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
        ]);

        $validated['is_active'] = 0; // Устанавливаем значение по умолчанию для нового объявления
        $validated['user_id'] = auth()->id(); // Добавляем user_id

        // Обработка изображений
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('photos', 'public');
            }
            $validated['images'] = json_encode($imagePaths);
        }

        Advertisement::create($validated);

        return redirect()->route('advertisements.index')->with('success', 'Объявление создано успешно');
    }

    // Метод для отображения объявлений по подкатегории
    public function showSubcategory($categoryId, $subcategoryId)
    {
        $advertisements = Advertisement::where('subcategory_id', $subcategoryId)
            ->where('is_active', 1) // Фильтрация по статусу "одобрен"
            ->get();

        $html = view('advertisements.partial_list', ['advertisements' => $advertisements])->render();

        return response()->json(['html' => $html]);
    }

    // Форма для редактирования объявления
    public function edit(Advertisement $advertisement)
    {
        if (Auth::user()->id != $advertisement->user_id) {
            return redirect()->route('advertisements.index')->with('error', 'У вас нет прав для редактирования этого объявления.');
        }

        $categories = Category::with('subcategories')->get();
        return view('advertisements.edit', compact('advertisement', 'categories'));
    }

    // Обновление объявления
    public function update(Request $request, Advertisement $advertisement)
    {
        if (Auth::user()->id != $advertisement->user_id) {
            return redirect()->route('advertisements.index')->with('error', 'У вас нет прав для обновления этого объявления.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'phone' => 'required|string|max:20',
            'square_meters' => 'nullable|numeric',
            'car_description' => 'nullable|string|max:255',
            'subcategory_id' => 'required|exists:subcategories,id',
            'price' => 'required|numeric|min:0',
        ]);

        // Логирование для отладки
        Log::info($request->file('images') ? 'Файлы загружаются' : 'Файлы не загружаются');

        // Обработка изображений
        if ($request->hasFile('images')) {
            // Удаление старых изображений
            if ($advertisement->images) {
                foreach (json_decode($advertisement->images) as $image) {
                    Storage::delete('public/' . $image);
                }
            }

            // Сохранение новых изображений
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('photos', 'public');
            }
            $validated['images'] = json_encode($imagePaths);
        }

        $advertisement->is_active = 0; // Устанавливаем статус "На доработку" при обновлении
        $advertisement->update($validated);

        return redirect()->route('advertisements.index')->with('success', 'Объявление обновлено успешно');
    }

    // Отображение объявления
    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);

        // Находим подкатегорию текущего объявления
        $subcategoryId = $advertisement->subcategory_id;
        
        // Находим категорию по подкатегории
        $categoryId = DB::table('subcategories')
            ->where('id', $subcategoryId)
            ->value('category_id');

        // Найти похожие объявления (по той же категории)
        $similarAds = Advertisement::where('subcategory_id', '!=', $subcategoryId)
            ->whereHas('subcategory', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->where('id', '!=', $advertisement->id)
            ->inRandomOrder()
            ->take(12)
            ->get()
            ->chunk(4); // разбиваем на группы по 4 объявления

        return view('advertisements.show', compact('advertisement', 'similarAds'));
    }

    // Удаление объявления
    public function destroy(Advertisement $advertisement)
    {
        if (Auth::user()->id != $advertisement->user_id) {
            return redirect()->route('advertisements.index')->with('error', 'У вас нет прав для удаления этого объявления.');
        }

        $advertisement->delete();
        return redirect()->route('advertisements.index')->with('success', 'Объявление удалено успешно');
    }
}
