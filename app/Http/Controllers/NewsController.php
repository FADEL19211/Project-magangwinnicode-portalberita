<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        $search = $request->query('search');
        $newsQuery = News::orderBy('created_at', 'desc');
        if ($category) {
            $newsQuery->where('category', $category);
        }
        if ($search) {
            $newsQuery->where('title', 'like', "%$search%");
        }
        $news = $newsQuery->get();
        $info = Info::first();
        $info_text = $info ? $info->text : null;
        return view('news.index', compact('news', 'category', 'info_text'));
    }

    public function show($id)
    {
        $news = News::with(['comments.user'])->findOrFail($id);
        $news->increment('views');
        return view('news.show', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB
        ]);

        $data = $request->only(['title', 'content', 'category']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }

        News::create($data);
        return redirect()->route('admin.dashboard')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB
        ]);

        $news = News::findOrFail($id);
        $data = $request->only(['title', 'content', 'category']);
        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }

        $news->update($data);
        return redirect()->route('admin.dashboard')->with('success', 'Berita berhasil diupdate.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Berita berhasil dihapus.');
    }
}
