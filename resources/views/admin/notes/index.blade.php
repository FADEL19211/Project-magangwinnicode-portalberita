@extends('layouts.app')
@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100" style="background:#f8f9fa;">
    <div class="card shadow p-4 w-100 position-relative" style="max-width: 600px; border-radius: 22px; border: 3px solid #0d6efd;">
        <div class="d-flex align-items-center mb-4" style="min-height:48px;">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm me-3" style="min-width:90px;"><i class="bi bi-arrow-left"></i> Kembali</a>
            <h2 class="mb-0 text-primary fw-bold flex-grow-1" style="font-size:1.5rem; text-align:left; margin-left:12px;">Deadline Berita</h2>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('admin.notes.store') }}" class="mb-4">
            @csrf
            <div class="input-group">
                <span class="input-group-text bg-light"><i class="bi bi-calendar-event"></i></span>
                <input type="text" name="content" class="form-control" placeholder="Tulis deadline baru..." required maxlength="120">
                <button class="btn btn-primary fw-semibold" type="submit"><i class="bi bi-plus-circle"></i> Tambah</button>
            </div>
        </form>
        <ul class="list-group mb-3">
            @forelse ($notes as $note)
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 border-bottom bg-light mb-2 rounded-3 shadow-sm">
                    <form method="POST" action="{{ route('admin.notes.update', $note->id) }}" class="d-flex flex-grow-1 me-2 align-items-center">
                        @csrf
                        @method('PUT')
                        <input type="text" name="content" value="{{ $note->content }}" class="form-control form-control-sm me-2 bg-white border-0" required maxlength="120">
                        <button class="btn btn-success btn-sm me-2 fw-semibold" type="submit"><i class="bi bi-save"></i></button>
                    </form>
                    <form method="POST" action="{{ route('admin.notes.destroy', $note->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm fw-semibold" type="submit"><i class="bi bi-trash"></i></button>
                    </form>
                </li>
            @empty
                <li class="list-group-item text-center border-0">Belum ada deadline.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
