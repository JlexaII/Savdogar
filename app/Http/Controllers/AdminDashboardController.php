<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::where('is_active', 0)->get();
        return view('admin.dashboard.index', compact('advertisements'));
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
