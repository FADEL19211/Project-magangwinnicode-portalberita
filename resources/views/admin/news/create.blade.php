<!DOCTYPE html>
<html>
<head>
    <title>Add News</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { background: #f8f9fa; }
        .container { max-width: 600px; }
        .form-label { font-weight: 500; }
        .form-section-title { font-size: 1.1em; font-weight: 600; color: #0d6efd; margin-bottom: 12px; }
        .input-group-text { background: #e9ecef; }
        .preview-img { max-width: 100%; max-height: 180px; margin-bottom: 10px; border-radius: 8px; }
        .btn-back { position: absolute; left: 24px; top: 24px; }
    </style>
</head>
<body>
    <div class="container mt-5 bg-white p-4 rounded shadow position-relative">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm btn-back"><i class="bi bi-arrow-left"></i> Kembali</a>
        <h2 class="mb-4 text-center">Tambah Berita</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-type"></i></span>
                    <input type="text" class="form-control" id="title" name="title" required maxlength="120" placeholder="Judul berita...">
                </div>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Isi Berita <span class="text-danger">*</span></label>
                <textarea class="form-control" id="content" name="content" rows="6" required placeholder="Tulis isi berita di sini..."></textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                <select class="form-select" id="category" name="category" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Business">Business</option>
                    <option value="Politics">Politics</option>
                    <option value="Entertainment">Entertainment</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                <img id="img-preview" class="preview-img d-none" alt="Preview Gambar">
            </div>
            <button type="submit" class="btn btn-primary w-100"><i class="bi bi-send"></i> Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('img-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                preview.classList.add('d-none');
            }
        }
    </script>
</body>
</html>
