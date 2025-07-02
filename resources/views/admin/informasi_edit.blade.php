@extends('admin.dashboard')
@section('content')
<style>
    .dashboard-container, .dashboard-title, .form-label, .alert, .btn, .form-control {
        color: #232323 !important;
        background: #fff !important;
    }
    .dark-mode .dashboard-container, .dark-mode .dashboard-title, .dark-mode .form-label, .dark-mode .alert, .dark-mode .btn, .dark-mode .form-control {
        color: #ededed !important;
        background: #232323 !important;
        border-color: #444 !important;
    }
    .dark-mode .btn-primary, .dark-mode .btn-outline-secondary {
        background: #0d6efd !important;
        color: #fff !important;
        border-color: #0d6efd !important;
    }
    .dark-mode .form-control {
        background: #232323 !important;
        color: #ededed !important;
        border-color: #444 !important;
    }
    .form-control, .btn, .alert {
        transition: color 0.2s, background 0.2s;
    }
    .info-blue {
        color: #0d6efd !important;
    }
    .dark-mode .info-blue {
        color: #4da3ff !important;
    }
</style>
<div class="dashboard-container position-relative" style="border:3px solid #0d6efd; border-radius:22px; max-width:600px; margin:40px auto; background:#fff;">
    <div class="d-flex align-items-center mb-4" style="min-height:48px;">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm me-3" style="min-width:90px;"><i class="bi bi-arrow-left"></i> Kembali</a>
        <h3 class="dashboard-title mb-0 flex-grow-1" style="font-size:1.3rem; text-align:left; margin-left:12px; color:#0d6efd;">Edit Informasi Beranda</h3>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('admin.informasi.update') }}">
        @csrf
        <div class="mb-3">
            <label for="info_text" class="form-label fw-semibold">Teks Informasi Berjalan</label>
            <textarea class="form-control info-blue" id="info_text" name="info_text" rows="2" required maxlength="200" placeholder="Tulis informasi berjalan di sini..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100 fw-semibold"><i class="bi bi-save"></i> Simpan</button>
    </form>
</div>
@endsection
