<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsApiController extends Controller
{
    public function index()
    {
        return response()->json(News::all());
    }

    public function show($id)
    {
        $news = News::find($id);
        if (!$news) return response()->json(['error' => 'Not found'], 404);
        return response()->json($news);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required',
        ]);
        $news = News::create($validated);
        return response()->json($news, 201);
    }

    public function update(Request $request, $id)
    {
        $news = News::find($id);
        if (!$news) return response()->json(['error' => 'Not found'], 404);
        $news->update($request->only(['title', 'content', 'category']));
        return response()->json($news);
    }

    public function destroy($id)
    {
        $news = News::find($id);
        if (!$news) return response()->json(['error' => 'Not found'], 404);
        $news->delete();
        return response()->json(['message' => 'Deleted']);
    }

    public function total()
    {
        return response()->json(['total' => \App\Models\News::count()]);
    }

    public function categoryStats()
    {
        $stats = \App\Models\News::selectRaw('category, COUNT(*) as total')
            ->groupBy('category')
            ->pluck('total', 'category');
        return response()->json([
            'labels' => $stats->keys()->toArray(),
            'data' => $stats->values()->toArray()
        ]);
    }
}
