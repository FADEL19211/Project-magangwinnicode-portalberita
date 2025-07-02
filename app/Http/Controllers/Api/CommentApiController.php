<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentApiController extends Controller
{
    public function index()
    {
        return response()->json(Comment::all());
    }

    public function show($id)
    {
        $comment = Comment::find($id);
        if (!$comment) return response()->json(['error' => 'Not found'], 404);
        return response()->json($comment);
    }

    public function total()
    {
        return response()->json(['total' => \App\Models\Comment::count()]);
    }
}
