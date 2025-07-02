<!DOCTYPE html>
<html>
<head>
    <title>{{ $news->title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        html, body { height: 100%; }
        body { min-height: 100vh; display: flex; flex-direction: column; background: #f8f9fa !important; }
        .main-content { flex: 1 0 auto; }
        .news-container { max-width: 750px; margin: 40px auto; background: #fff; border-radius: 18px; box-shadow: 0 8px 32px rgba(0,0,0,0.10); padding: 36px 32px 28px 32px; }
        .news-title, .news-hero h1, .display-4 {
            font-weight: 800;
            color: #0d6efd;
            font-size:2.1rem;
            letter-spacing:0.5px;
            word-break: break-word;
            white-space: normal;
            overflow-wrap: break-word;
        }
        .news-meta { color: #6c757d; font-size: 1rem; margin-bottom: 16px; }
        .news-image { max-width: 100%; border-radius: 12px; margin-bottom: 28px; box-shadow:0 2px 12px rgba(0,0,0,0.07); }
        .news-content { font-size:1.13rem; line-height:1.8; color:#232323; margin-bottom: 32px; }
        .badge-category { font-size:1em; background:#e9ecef; color:#0d6efd; font-weight:600; border-radius:6px; padding:6px 16px; }
        .btn-back { margin-bottom: 18px; }
        .comment-list { margin-bottom: 32px; }
        .comment-list .list-group-item { border-radius: 8px; margin-bottom: 8px; background: #f6f8fa; border: 1px solid #e3e6ea; }
        .comment-user { font-weight: 600; color: #0d6efd; }
        .comment-time { font-size: 0.9em; color: #888; }
        .form-label { font-weight: 500; }
        .comment-form { background: #f8f9fa; border-radius: 10px; padding: 18px 18px 10px 18px; box-shadow:0 2px 8px rgba(0,0,0,0.04); }
        .news-hero {
            min-height: 320px;
            background-size: cover;
            background-position: center;
            position: relative;
            border-radius: 0 0 24px 24px;
            margin-bottom: 0;
        }
        .news-hero .overlay {
            background: linear-gradient(180deg,rgba(0,0,0,0.45) 60%,rgba(0,0,0,0.05) 100%);
            min-height: 320px;
            border-radius: 0 0 24px 24px;
            display: flex; align-items: flex-end;
        }
        .news-hero .container { position: relative; z-index: 2; padding-bottom: 32px; }
        .news-hero h1 { color: #fff; font-weight: 800; text-shadow:0 2px 12px rgba(0,0,0,0.18); }
        .news-hero .meta, .news-hero .badge { color: #fff; }
        .breadcrumb-container {
            background: #f4f6fa;
            border-radius: 10px;
            border: 1.5px solid #e3e6ea;
            margin: 24px 0 0 0;
            padding: 0.5rem 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        }
        .breadcrumb {
            margin-bottom: 0;
            padding: 0.5rem 1.2rem;
            background: transparent;
            border-radius: 10px;
            justify-content: center;
            font-size: 1.05rem;
            font-weight: 500;
        }
        .breadcrumb-item a {
            color: #0d6efd;
            text-decoration: none;
        }
        .breadcrumb-item.active {
            color: #232323;
        }
        .dark-mode .breadcrumb-container {
            background: #232323;
            border-color: #444;
        }
        .dark-mode .breadcrumb {
            color: #ededed;
        }
        .dark-mode .breadcrumb-item a {
            color: #4da3ff;
        }
        .dark-mode .breadcrumb-item.active {
            color: #ededed;
        }
        @media (max-width:991px) { .container.d-flex { flex-direction:column !important; } .sidebar { width:100% !important; margin-top:32px; } }
    </style>
</head>
<body>
    @include('partials.navbar')
    <div class="main-content">
        <div class="news-container">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-back"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
            <div class="news-hero" style="background:url('{{ asset('storage/'.$news->image) }}') center/cover;">
                <div class="overlay">
                    <div class="container">
                        <span class="badge bg-primary">{{ $news->category }}</span>
                        <h1 class="display-4 mt-2">{{ $news->title }}</h1>
                        <div class="meta mt-2">
                            <span>{{ $news->created_at->format('d M Y') }}</span> |
                            <span>Penulis: {{ $news->author->name ?? 'Admin' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumb-container">
                <div class="container p-0">
                    <ol class="breadcrumb d-flex align-items-center justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                        <li class="breadcrumb-item active">{{ $news->title }}</li>
                    </ol>
                </div>
            </nav>
            <div class="container my-4">
                <main>
                    <article class="news-content">
                        <p class="dropcap">{!! nl2br(e($news->content)) !!}</p>
                    </article>
                    <div class="share-buttons my-4">
                        <button class="btn btn-outline-primary" onclick="shareTo('facebook')"><i class="bi bi-facebook"></i></button>
                        <button class="btn btn-outline-info" onclick="shareTo('twitter')"><i class="bi bi-twitter"></i></button>
                        <button class="btn btn-outline-success" onclick="shareTo('whatsapp')"><i class="bi bi-whatsapp"></i></button>
                        <button class="btn btn-outline-secondary" onclick="navigator.clipboard.writeText(window.location.href)"><i class="bi bi-link-45deg"></i></button>
                    </div>
                    <h5 class="mt-5">Berita Terkait</h5>
                    <div class="row">
                        @foreach($related ?? [] as $item)
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('news.show', $item->id) }}" class="card h-100 text-decoration-none">
                                <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top related-img" alt="">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $item->title }}</h6>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <section class="comments mt-5">
                        <h4>Komentar</h4>
                        @foreach($news->comments as $comment)
                            <div class="d-flex mb-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name ?? 'User') }}" class="rounded-circle me-2">
                                <div>
                                    <strong>{{ $comment->user->name ?? 'User' }}</strong>
                                    <span class="text-muted small">{{ $comment->created_at->diffForHumans() }}</span>
                                    <div>{{ $comment->comment }}</div>
                                </div>
                            </div>
                        @endforeach
                        @auth
                        <form method="POST" action="{{ route('news.comment', $news->id) }}" class="mt-3">
                            @csrf
                            <textarea class="form-control mb-2" name="comment" rows="3" placeholder="Tulis komentar..."></textarea>
                            <button class="btn btn-primary"><i class="bi bi-send"></i> Kirim</button>
                        </form>
                        @endauth
                    </section>
                </main>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
function shareTo(platform) {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent(document.title);
    let shareUrl = '';
    if (platform === 'facebook') {
        shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
    } else if (platform === 'twitter') {
        shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
    } else if (platform === 'whatsapp') {
        shareUrl = `https://wa.me/?text=${title}%20${url}`;
    }
    if (shareUrl) {
        window.open(shareUrl, '_blank', 'width=600,height=500');
    }
}
</script>
</body>
</html>
