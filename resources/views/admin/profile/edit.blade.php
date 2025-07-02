@extends('layouts.app')
@section('content')
<div class="main-content">
    <div class="container d-flex align-items-center justify-content-center min-vh-100" style="background:#f8f9fa;">
        <div class="card shadow p-4 w-100 position-relative" style="max-width: 430px; border-radius: 24px; border: 3px solid #0d6efd;">
            <div class="d-flex align-items-center mb-3" style="min-height:48px;">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm me-3" style="min-width:90px;"><i class="bi bi-arrow-left"></i> Kembali</a>
                <h2 class="mb-0 text-primary fw-bold flex-grow-1" style="font-size:1.5rem; text-align:left; margin-left:12px;">Edit Profil Admin</h2>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form method="POST" action="{{ route('admin.profile.update') }}" autocomplete="off">
                @csrf
                <div class="mb-3 text-center">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Foto Profil" class="rounded-circle mb-2 border border-3 border-primary" style="width: 90px; height: 90px; object-fit: cover;">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required maxlength="60" placeholder="Nama lengkap admin">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label fw-semibold">Alamat</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $user->address ?? '' }}" placeholder="Alamat admin">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label fw-semibold">Nomor Telepon</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone ?? '' }}" placeholder="Nomor telepon admin">
                </div>
                <div class="mb-3">
                    <label for="nag" class="form-label fw-semibold">NAG</label>
                    <input type="text" class="form-control" id="nag" name="nag" value="{{ $user->nag ?? '' }}" placeholder="NAG admin">
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-2 fw-semibold"><i class="bi bi-save"></i> Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
