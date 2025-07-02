<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container-fluid" style="height:56px;min-height:56px;display:flex;align-items:center;padding-left:2rem;">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}" style="font-size:1.5rem;font-weight:800;letter-spacing:1px;color:#0d6efd;line-height:56px;">GoodNews</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
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
                <li class="nav-item d-flex align-items-center me-2">
                    @auth
                        <span class="fw-semibold" style="font-size:1.08em;"><i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}</span>
                    @endauth
                </li>
                <li class="nav-item">
                    <button id="toggleMode" class="btn btn-outline-dark" type="button" title="Toggle Light/Dark Mode"><i class="bi bi-brightness-high"></i></button>
                </li>
                @guest
                    <li class="nav-item ms-2">
                        <a class="btn btn-outline-primary px-3" href="{{ route('login') }}" style="height:36px;display:flex;align-items:center;">Login</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<script>
// Light/Dark mode toggle
const toggleBtn = document.getElementById('toggleMode');
function setMode(mode) {
    if (mode === 'dark') {
        document.body.classList.add('dark-mode');
        document.body.classList.remove('light-mode');
    } else {
        document.body.classList.remove('dark-mode');
        document.body.classList.add('light-mode');
    }
    localStorage.setItem('themeMode', mode);
}
if (toggleBtn) {
    toggleBtn.addEventListener('click', function() {
        const isDark = document.body.classList.contains('dark-mode');
        setMode(isDark ? 'light' : 'dark');
    });
}
const savedMode = localStorage.getItem('themeMode');
if (savedMode) setMode(savedMode);
</script>
<style>
.dark-mode {
    background: #181818 !important;
    color: #ededed !important;
}
.dark-mode .navbar, .dark-mode .news-container {
    background: #232323 !important;
    color: #ededed !important;
}
.dark-mode .news-title, .dark-mode .news-content, .dark-mode .news-meta, .dark-mode .badge-category, .dark-mode .breadcrumb, .dark-mode .comment-list, .dark-mode .form-label, .dark-mode .btn, .dark-mode .related-img, .dark-mode .comments {
    color: #ededed !important;
    background: transparent !important;
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
.light-mode {
    background: #fff !important;
    color: #232323 !important;
}
.light-mode .navbar, .light-mode .news-container {
    background: #fff !important;
    color: #232323 !important;
}
.light-mode .news-title, .light-mode .news-content, .light-mode .news-meta, .light-mode .badge-category, .light-mode .breadcrumb, .light-mode .comment-list, .light-mode .form-label, .light-mode .btn, .light-mode .related-img, .light-mode .comments {
    color: #232323 !important;
    background: transparent !important;
}
.light-mode .form-control, .light-mode .input-group-text {
    background: #fff !important;
    color: #232323 !important;
    border-color: #ccc !important;
}
.light-mode .btn-primary, .light-mode .btn-outline-primary {
    background: #0d6efd !important;
    color: #fff !important;
    border-color: #0d6efd !important;
}
</style>
