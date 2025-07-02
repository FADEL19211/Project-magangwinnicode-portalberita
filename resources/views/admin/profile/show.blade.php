@extends('layouts.app')
@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100" style="background:#f8f9fa;">
    <div class="card shadow p-4 w-100 position-relative" style="max-width: 500px; border-radius: 22px; border: 3px solid #0d6efd;">
        <div class="d-flex align-items-center mb-4" style="min-height:48px;">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm me-3" style="min-width:90px;"><i class="bi bi-arrow-left"></i> Kembali</a>
            <h2 class="mb-0 text-primary fw-bold flex-grow-1" style="font-size:1.3rem; text-align:left; margin-left:12px;">Data Diri Admin</h2>
        </div>
        <div class="text-center mb-3">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Foto Profil" class="rounded-circle border border-3 border-primary" style="width: 90px; height: 90px; object-fit: cover;">
        </div>
        <div class="mb-2"><strong>Nama Lengkap:</strong> {{ $user->name }}</div>
        <div class="mb-2"><strong>Email:</strong> {{ $user->email }}</div>
        <div class="mb-2"><strong>Alamat:</strong> {{ $user->address ?? '-' }}</div>
        <div class="mb-2"><strong>Nomor Telepon:</strong> {{ $user->phone ?? '-' }}</div>
        <div class="mb-2"><strong>NAG:</strong> {{ $user->nag ?? '-' }}</div>
        <div class="mb-2"><strong>Role:</strong> Administrator</div>
    </div>
</div>
@endsection
