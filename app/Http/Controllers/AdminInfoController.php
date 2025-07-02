<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class AdminInfoController extends Controller
{
    public function edit()
    {
        $info = Info::first();
        return view('admin.informasi_edit', ['info_text' => $info ? $info->text : '']);
    }

    public function update(Request $request)
    {
        $request->validate(['info_text' => 'required|string']);
        $info = Info::first();
        if (!$info) {
            $info = new Info();
        }
        $info->text = $request->info_text;
        $info->save();
        return redirect()->route('admin.informasi.edit')->with('success', 'Informasi berhasil diperbarui!');
    }
}
