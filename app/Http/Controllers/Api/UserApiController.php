<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['error' => 'Not found'], 404);
        return response()->json($user);
    }

    public function total()
    {
        return response()->json(['total' => \App\Models\User::count()]);
    }
}
