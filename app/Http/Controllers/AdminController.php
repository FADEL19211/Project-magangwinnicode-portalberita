<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.dashboard', compact('news'));
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

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }

        News::create($data);
        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
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
        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }

        $news->update($data);
        return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('admin.dashboard')->with('success', 'News deleted successfully.');
    }
}
