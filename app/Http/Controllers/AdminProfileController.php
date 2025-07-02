<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class AdminProfileController extends Controller
{
    public function edit()
    {
        // Ambil user admin saja
        $user = User::where('is_admin', 1)->first();
        return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // Pastikan hanya admin yang bisa update profil admin
        $user = User::where('is_admin', 1)->first();
        $request->validate([
            'name' => 'required',
            'address' => 'nullable',
            'phone' => 'nullable',
            'nag' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->nag = $request->nag;
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $user->image = $request->file('image')->store('profile_images', 'public');
        }
        $user->save();
        return redirect()->route('admin.dashboard')->with('success', 'Profil admin berhasil diperbarui.');
    }

    public function show()
    {
        // Tampilkan hanya data admin
        $user = User::where('is_admin', 1)->first();
        return view('admin.profile.show', compact('user'));
    }
}
