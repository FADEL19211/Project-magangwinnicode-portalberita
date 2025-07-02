<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $newsId)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'news_id' => $newsId,
            'comment' => $request->comment,
        ]);

        return back();
    }
}
