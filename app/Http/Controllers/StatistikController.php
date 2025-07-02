<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\News;
use App\Models\Comment;

class StatistikController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalNews = News::count();
        $totalComments = Comment::count();
        $totalAdmins = User::where('is_admin', 1)->count();
        // Statistik kategori berita
        $categoryStats = News::selectRaw('category, COUNT(*) as total')
            ->groupBy('category')
            ->pluck('total', 'category');
        // Statistik views berita (top 10)
        $topViews = News::orderBy('views', 'desc')->take(10)->get(['title', 'views']);
        $totalViews = News::sum('views');
        return view('admin.statistik', compact('totalUsers', 'totalNews', 'totalComments', 'totalAdmins', 'categoryStats', 'topViews', 'totalViews'));
    }
}
