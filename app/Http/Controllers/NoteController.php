<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', Auth::id())->latest()->get();
        return view('admin.notes.index', compact('notes'));
    }

    public function store(Request $request)
    {
        $request->validate(['content' => 'required']);
        Note::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);
        return redirect()->route('admin.notes.index')->with('success', 'Catatan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $note = Note::where('user_id', Auth::id())->findOrFail($id);
        $request->validate(['content' => 'required']);
        $note->update(['content' => $request->content]);
        return redirect()->route('admin.notes.index')->with('success', 'Catatan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $note = Note::where('user_id', Auth::id())->findOrFail($id);
        $note->delete();
        return redirect()->route('admin.notes.index')->with('success', 'Catatan berhasil dihapus.');
    }
}
