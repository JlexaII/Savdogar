<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Начальный запрос с загрузкой пользователя
        $query = Advertisement::with('user');

        // Фильтрация по дате
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        // Сортировка
        if ($request->has('sort_by') && $request->has('sort_order')) {
            $query->orderBy($request->get('sort_by'), $request->get('sort_order'));
        } else {
            // По умолчанию сортировка по дате создания
            $query->orderBy('created_at', 'desc');
        }

        // Пагинация
        $advertisements = $query->paginate(20);

        // Общее количество объявлений
        $totalAdvertisements = Advertisement::count();

        return view('admin.dashboard.index', compact('advertisements', 'totalAdvertisements'));
    }

    public function approve($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->is_active = 1; // Одобрено
        $advertisement->save();

        return response()->json(['success' => true]);
    }

    public function rework($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->is_active = 2; // На доработке
        $advertisement->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete();

        return response()->json(['success' => true]);
    }
}
