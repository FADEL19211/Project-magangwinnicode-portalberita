<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user_management', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->is_admin) {
            return back()->with('error', 'Tidak bisa menghapus admin utama.');
        }
        $user->delete();
        return back()->with('success', 'User berhasil dihapus.');
    }
}
