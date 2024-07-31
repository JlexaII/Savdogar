<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    // Отображение списка объявлений
    public function index()
    {
        $user = Auth::user();
        $advertisements = Advertisement::where('user_id', $user->id)->get();
        $categoryId = 1; // Установите ID категории или получите его из запроса
        return view('advertisements.index', [
            'advertisements' => $advertisements,
            'categoryId' => $categoryId
        ]);
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
        $advertisements = Advertisement::where('user_id', $user->id)->get();
        return view('advertisements.index', compact('advertisements'));
    }

    // Сохранение нового объявления
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Валидация для каждого изображения
            'address' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
            'square_meters' => 'nullable|numeric',
            'car_description' => 'nullable|string|max:255',
            'subcategory_id' => 'required|exists:subcategories,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $validated['is_active'] = false; // Устанавливаем значение по умолчанию

        // Обработка изображений
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('photos', 'public');
            }
            $validated['images'] = json_encode($imagePaths);
        }
        // Добавьте user_id
        $validated['user_id'] = auth()->id();

        Advertisement::create($validated);

        return redirect()->route('advertisements.index')->with('success', 'Объявление создано успешно');
    }

    // Отображение одного объявления
    public function show(Advertisement $advertisement)
    {
        return view('advertisements.show', compact('advertisement'));
    }

    // Форма для редактирования объявления
    public function edit(Advertisement $advertisement)
    {
        $categories = Category::with('subcategories')->get();
        return view('advertisements.edit', compact('advertisement', 'categories'));
    }

    // Обновление объявления
    public function update(Request $request, Advertisement $advertisement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
            'square_meters' => 'nullable|numeric',
            'car_description' => 'nullable|string|max:255',
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);

        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('photos', 'public');
            }
            $validated['images'] = json_encode($imagePaths);
        }
        $advertisement->is_active = 0; // Предположим, что 2 - это статус "Обработка"
        $advertisement->update($validated);

        return redirect()->route('advertisements.index')->with('success', 'Объявление обновлено успешно');
    }

    // Удаление объявления
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return redirect()->route('advertisements.index')->with('success', 'Объявление удалено успешно');
    }
}
