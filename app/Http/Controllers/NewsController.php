<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News; // Убедитесь, что у вас есть модель News

class NewsController extends Controller
{
    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        News::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('home')->with('success', 'Новость добавлена успешно!');
    }
}
