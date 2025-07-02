<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { background: #f8f9fa; }
        .sidebar {
            min-height: 100vh;
            background: #fff;
            box-shadow: 2px 0 12px rgba(0,0,0,0.06);
            padding: 24px 0 0 0;
            position: fixed;
            left: 0; top: 0; bottom: 0;
            width: 230px;
            z-index: 100;
        }
        .sidebar .profile {
            text-align: center;
            margin-bottom: 32px;
        }
        .sidebar .profile img {
            width: 56px; height: 56px; border-radius: 50%; object-fit: cover;
        }
        .sidebar .profile .name {
            font-weight: 600; margin-top: 8px;
        }
        .sidebar .profile .role {
            font-size: 0.95em; color: #888;
        }
        .sidebar .nav-link {
            color: #222;
            font-weight: 500;
            border-radius: 8px;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            transition: background 0.15s;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background: #0d6efd;
            color: #fff;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
            font-size: 1.2em;
        }
        .sidebar .sidebar-section {
            font-size: 0.92em;
            color: #888;
            margin: 18px 0 8px 18px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .main-content {
            margin-left: 230px;
            padding: 32px 24px 24px 24px;
        }
        @media (max-width: 991px) {
            .sidebar { position: static; width: 100%; min-height: auto; box-shadow: none; }
            .main-content { margin-left: 0; padding: 16px; }
        }
        .dashboard-container { max-width: 900px; margin: 40px auto; background: #fff; border-radius: 16px; box-shadow: 0 8px 32px rgba(0,0,0,0.08); padding: 32px 28px 24px 28px; }
        .dashboard-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; }
        .dashboard-title { font-weight: 700; color: #0d6efd; }
        .table thead th { background: #0d6efd; color: #fff; }
        .btn-action { margin-right: 6px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile">
            @php $admin = \App\Models\User::where('is_admin', 1)->first(); @endphp
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Admin">
            <div class="name">{{ $admin ? $admin->name : 'Admin' }}</div>
            <div class="role">Administrator</div>
        </div>
        <nav class="nav flex-column px-3">
            <a class="nav-link active" href="#"><i class="bi bi-house-door-fill"></i> Dashboard</a>
            <a class="nav-link" href="{{ route('admin.news.create') }}"><i class="bi bi-plus-square"></i> Input Berita</a>
            <a class="nav-link" href="{{ route('admin.profile.edit') }}"><i class="bi bi-person-circle"></i> Edit Profil</a>
            <a class="nav-link" href="{{ route('admin.notes.index') }}"><i class="bi bi-journal-text"></i> Deadline</a>
            <a class="nav-link" href="{{ route('admin.informasi.edit') }}"><i class="bi bi-info-circle"></i> Informasi Edit</a>
            <a class="nav-link" href="{{ route('admin.statistik') }}"><i class="bi bi-bar-chart"></i> Statistik</a>
            <a class="nav-link" href="{{ route('admin.users.index') }}"><i class="bi bi-people"></i> Manajemen User</a>
            <div class="mt-auto"></div>
            <a class="nav-link mt-2" style="margin-bottom:6px;" href="{{ route('admin.profile.show') }}">
                <i class="bi bi-person-badge"></i> Data Diri
            </a>
        </nav>
        <div class="mt-5 px-3">
            {{-- Diagram statistik dihapus, hanya tampil di menu Statistik --}}
        </div>
    </div>
    <div class="main-content">
        @yield('content')
        @if(isset($news))
        <div class="dashboard-header">
            <h2 class="dashboard-title mb-0">Admin Dashboard</h2>
            <div>
                <span class="me-2">Welcome, <strong>{{ $admin ? $admin->name : 'Admin' }}</strong></span>
                <form method="POST" action="{{ route('logout') }}" style="display:inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                </form>
            </div>
        </div>
        <div class="mb-3 text-end">
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary">+ Add News</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td><span class="badge bg-secondary">{{ $item->category }}</span></td>
                            <td>
                                <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-warning btn-sm btn-action">Edit</a>
                                <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-action">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
    // Contoh data statistik, ganti dengan data dinamis jika perlu
    const ctx = document.getElementById('statistikChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Business', 'Teknologi', 'Olahraga', 'Lainnya'],
            datasets: [{
                data: [12, 8, 5, 3], // Ganti dengan data dinamis
                backgroundColor: ['#0d6efd', '#e53935', '#ffc107', '#6c757d'],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: { display: true, position: 'bottom', labels: { font: { size: 12 } } }
            },
            cutout: '65%',
            responsive: false,
            maintainAspectRatio: false
        }
    });
    </script>
</body>
</html>
