<!DOCTYPE html>
<html>
<head>
    <title>Portal Berita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        html, body {
            height: 100%;
        }
        body {
            min-height: 100vh;
            background: #fff !important;
            color: #232323;
        }
        .main-content {
            flex: 1 0 auto;
        }
        .navbar {
            background-color: #0d6efd !important;
            height: 56px;
            min-height: 56px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            display: flex;
            align-items: center;
            padding: 0;
        }
        .navbar-brand, .nav-link, .navbar-text {
            color: #fff !important;
            font-weight: 700;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: 1px;
            line-height: 56px;
        }
        .news-grid {
            display: flex;
            gap: 24px;
            margin-top: 32px;
            flex-wrap: wrap;
        }
        .headline-news {
            flex: 2 1 0%;
            min-width: 0;
            background: #181818;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            display: flex;
            flex-direction: column;
            min-height: 350px;
            padding: 0;
        }
        .headline-img {
            width: 100%;
            height: 100%;
            min-height: 350px;
            object-fit: cover;
            display: block;
        }
        .headline-overlay {
            position: absolute;
            left: 0; right: 0; bottom: 0;
            background: linear-gradient(0deg,rgba(0,0,0,0.7) 70%,rgba(0,0,0,0.1) 100%);
            color: #fff;
            padding: 32px 24px 18px 24px;
            width: 100%;
        }
        .headline-category {
            position: absolute;
            top: 16px; left: 16px;
            z-index: 2;
            background: #e53935;
            color: #fff;
            font-size: 0.95em;
            font-weight: 700;
            padding: 4px 16px;
            border-radius: 4px;
            letter-spacing: 1px;
        }
        .headline-title {
            font-size: 1.45rem;
            font-weight: 700;
            margin-bottom: 0;
            text-shadow: 0 2px 8px rgba(0,0,0,0.25);
        }
        .side-news-list {
            flex: 1 1 0%;
            display: flex;
            flex-direction: column;
            gap: 18px;
            min-width: 0;
        }
        .side-news-card {
            background: #181818;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            min-height: 100px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 0;
        }
        .side-img {
            width: 100%;
            height: 100px;
            object-fit: cover;
            display: block;
        }
        .side-category {
            position: absolute;
            top: 12px; left: 12px;
            z-index: 2;
            background: #e53935;
            color: #fff;
            font-size: 0.85em;
            font-weight: 700;
            padding: 3px 12px;
            border-radius: 4px;
            letter-spacing: 1px;
        }
        .side-title {
            font-size: 1.05rem;
            font-weight: 700;
            margin: 0;
            padding: 0 12px 12px 12px;
            color: #fff;
            border-radius: 0 0 8px 8px;
            text-shadow: none;
            word-break: break-word;
            overflow-wrap: break-word;
        }
        .dark-mode .side-title {
            color: #fff !important;
            text-shadow: none;
        }
        .marquee-container {
            overflow: hidden;
            border-radius: 12px;
            position: relative;
            background: transparent !important;
            border: none !important;
            margin-bottom: 24px;
        }
        .marquee-text {
            display: inline-block;
            white-space: nowrap;
            font-size: 1.15rem;
            font-weight: 500;
            color: #0d6efd; /* biru utama */
            animation: marquee-right 18s linear infinite;
        }
        .dark-mode .marquee-text {
            color: #4da3ff !important; /* biru terang di dark mode */
        }
        .form-control::placeholder {
            color: #0d6efd !important; /* biru utama */
            opacity: 1;
        }
        .dark-mode .form-control::placeholder {
            color: #4da3ff !important;
        }
        @keyframes marquee-right {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        @media (max-width: 991px) {
            .news-grid { flex-direction: column; gap: 18px; }
            .headline-news, .side-news-list { width: 100%; }
        }
        .dark-mode {
            background: #181818 !important;
            color: #ededed !important;
        }
        .dark-mode .navbar, .dark-mode .headline-news, .dark-mode .side-news-card {
            background: #232323 !important;
            color: #ededed !important;
        }
        .dark-mode .news-grid, .dark-mode .container, .dark-mode .marquee-container {
            background: #232323 !important;
            color: #ededed !important;
        }
        .dark-mode .headline-overlay, .dark-mode .side-title {
            color: #ededed !important;
        }
        .dark-mode .form-control, .dark-mode .input-group-text {
            background: #232323 !important;
            color: #ededed !important;
            border-color: #444 !important;
        }
        .dark-mode .btn-primary, .dark-mode .btn-outline-primary {
            background: #0d6efd !important;
            color: #fff !important;
            border-color: #0d6efd !important;
        }
        /* Default (light mode) */
        .side-title, .news-grid .text-dark, .news-grid a:not(.navbar-brand), .news-grid .mt-1, .news-grid .mb-1, .news-grid .fw-bold, .news-grid .side-category, .news-grid .headline-category {
            color: #232323 !important;
        }
        /* Dark mode override */
        .dark-mode .side-title, .dark-mode .news-grid .text-dark, .dark-mode .news-grid a:not(.navbar-brand), .dark-mode .news-grid .mt-1, .dark-mode .news-grid .mb-1, .dark-mode .news-grid .fw-bold, .dark-mode .news-grid .side-category, .dark-mode .news-grid .headline-category {
            color: #ededed !important;
        }
        .news-grid .mt-1, .news-grid .mb-1, .news-grid .fw-bold {
            transition: color 0.2s;
        }
        .dark-mode .news-grid .mb-1 {
            color: #ededed !important;
        }
        .dark-mode .news-grid .mt-1 {
            color: #ededed !important;
        }
        .dark-mode .text-dark {
            color: #ededed !important;
        }
        .dark-mode .news-grid a.text-dark {
            color: #ededed !important;
        }
        .news-list-title {
            color: #232323 !important;
        }
        .news-list-date {
            color: #232323 !important;
            font-size: 0.97em;
        }
        .dark-mode .news-list-title, .dark-mode .news-list-date {
            color: #fff !important;
        }
        .news-harian-title {
            color: #232323 !important;
        }
        .dark-mode .news-harian-title {
            color: #fff !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid" style="height:56px;min-height:56px;display:flex;align-items:center;padding-left:2rem;">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#" style="font-size:1.5rem;font-weight:800;letter-spacing:1px;color:#0d6efd;line-height:56px;">GoodNews</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">All</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="kategoriDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="kategoriDropdown">
                            <li><a class="dropdown-item" href="{{ route('home', ['category' => 'Business']) }}">Business</a></li>
                            <li><a class="dropdown-item" href="{{ route('home', ['category' => 'Politics']) }}">Politics</a></li>
                            <li><a class="dropdown-item" href="{{ route('home', ['category' => 'Entertainment']) }}">Entertainment</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle" style="font-size:1.3em;"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                {{-- <li><a class="dropdown-item" href="{{ route('user.profile.show') }}">Profile</a></li> --}}
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-outline-primary px-3" href="{{ route('login') }}" style="height:36px;display:flex;align-items:center;">Login</a>
                        </li>
                    @endauth
                    <button class="btn btn-outline-dark ms-2" id="toggleDarkMode" type="button" title="Dark Mode"><i class="bi bi-moon"></i></button>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <form method="GET" action="{{ route('home') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari berita berdasarkan judul..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i> Cari</button>
            </div>
        </form>
        <div class="container-fluid mt-4" style="padding-left:0;padding-right:0;">
            <div class="marquee-container p-3 text-center mb-4">
                <span class="marquee-text">
                    {!! $info_text ?? '<b>GoodNews</b> Artikel berita terbaru dan terpopuler untuk anda.' !!}
                </span>
            </div>
        </div>
        <div class="news-grid">
            @php $headline = $news->first(); $sideNews = $news->slice(1,4); @endphp
            @if($headline)
            <div class="headline-news">
                @if ($headline->image)
                    <img src="{{ asset('storage/' . $headline->image) }}" class="headline-img" alt="Headline Image">
                @else
                    <img src="https://via.placeholder.com/600x260?text=No+Image" class="headline-img" alt="No Image">
                @endif
                <div class="headline-category">{{ strtoupper($headline->category) }}</div>
                <div class="headline-overlay">
                    <h3 class="headline-title">{{ $headline->title }}</h3>
                </div>
                <a href="{{ route('news.show', $headline->id) }}" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:3;"></a>
            </div>
            @endif
            <div class="side-news-list">
                @foreach($sideNews as $item)
                <div class="side-news-card" style="padding:0;height:100px;">
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="side-img" alt="News Image">
                    @else
                        <img src="https://via.placeholder.com/400x100?text=No+Image" class="side-img" alt="No Image">
                    @endif
                    <div class="side-category">{{ strtoupper($item->category) }}</div>
                    <div class="side-title">{{ Str::limit($item->title, 60) }}</div>
                    <a href="{{ route('news.show', $item->id) }}" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:3;"></a>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Tambahan: List Berita Terbaru -->
        @if($news->count() > 5)
        <div class="row g-0 mt-5 mb-4">
            <div class="col-12">
                <h4 class="fw-bold mb-3 news-harian-title" style="letter-spacing:0.5px;">HARIAN</h4>
                <div style="height:3px;width:48px;background:#e53935;margin-bottom:24px;"></div>
            </div>
            @foreach($news->slice(5) as $item)
            <div class="col-12 mb-4 pb-3" style="background:transparent;border-radius:12px;">
                <div class="d-flex align-items-center gap-3 p-3">
                    <div style="min-width:120px;max-width:140px;">
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="News Image" class="rounded-3" style="width:100%;height:90px;object-fit:cover;">
                        @else
                            <img src="https://via.placeholder.com/140x90?text=No+Image" alt="No Image" class="rounded-3" style="width:100%;height:90px;object-fit:cover;">
                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <div class="mb-1" style="font-size:0.98em;font-weight:600;color:#e53935;">{{ $item->category }}</div>
                        <a href="{{ route('news.show', $item->id) }}" class="text-dark text-decoration-none news-list-title" style="font-size:1.18em;font-weight:500;">{{ $item->title }}</a>
                        <div class="mt-1 news-list-date">{{ $item->created_at->format('d F Y, H:i') }} WIB</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        @if($news->isEmpty())
            <div class="alert alert-warning text-center mt-4">Belum ada berita tersedia.</div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Dark mode toggle
    const toggleBtn = document.getElementById('toggleDarkMode');
    toggleBtn?.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
        localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
    });
    // On load, set dark mode if previously enabled
    if (localStorage.getItem('darkMode') === 'true') {
        document.body.classList.add('dark-mode');
    }
    </script>
</body>
</html>
