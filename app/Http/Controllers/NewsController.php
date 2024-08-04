<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

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

        return redirect()->route('news.index')->with('success', 'Новость добавлена успешно!');
    }

    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('news.index')->with('success', 'Новость обновлена успешно!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Новость удалена успешно!');
    }
}
