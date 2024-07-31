<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Фильтрация по дате
        $query = Advertisement::query(); // Убираем фильтр по is_active для отображения всех объявлений

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        // Пагинация
        $advertisements = $query->paginate(10);

        // Общее количество объявлений
        $totalAdvertisements = Advertisement::count();

        return view('admin.dashboard.index', compact('advertisements', 'totalAdvertisements'));
    }

    public function approve($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->is_active = 1; // Устанавливаем как одобренное
        $advertisement->save();

        return redirect()->route('admin.dashboard.index')->with('success', 'Объявление одобрено.');
    }

    public function rework($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->is_active = 2; // Устанавливаем как нуждающееся в доработке
        $advertisement->save();

        return redirect()->route('admin.dashboard.index')->with('success', 'Объявление помечено для доработки.');
    }

    public function destroy($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete();

        return redirect()->route('admin.dashboard.index')->with('success', 'Объявление удалено.');
    }
}
