@extends('admin.dashboard')
@section('content')
<div class="dashboard-container">
    <h2 class="dashboard-title mb-4">Statistik Portal</h2>
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total User</h5>
                    <p class="display-6">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Berita</h5>
                    <p class="display-6">{{ $totalNews }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Komentar</h5>
                    <p class="display-6">{{ $totalComments }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Admin</h5>
                    <p class="display-6">{{ $totalAdmins }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col-12 col-md-8 col-lg-7">
            <div class="card p-4 shadow-sm border-0">
                <h4 class="mb-4 text-center fw-bold" style="color:#0d6efd;letter-spacing:0.5px;">Statistik Views Berita</h4>
                <div class="mb-3 text-center" style="font-size:1.15em;font-weight:600;">
                    Total Views Seluruh Berita: <span class="badge bg-primary" style="font-size:1.1em;">{{ $totalViews }}</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0" style="background:#fff;border-radius:10px;overflow:hidden;">
                        <thead class="table-light">
                            <tr style="text-align:center;">
                                <th style="width:70%">Judul Berita</th>
                                <th style="width:30%">Jumlah Views</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($topViews as $item)
                            <tr>
                                <td style="font-size:1.05em;">{{ $item->title }}</td>
                                <td style="text-align:center;font-weight:600;">{{ $item->views }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
