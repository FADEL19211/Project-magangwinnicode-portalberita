<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        html, body { height: 100%; margin: 0; padding: 0; overflow: hidden; }
        body { min-height: 100vh; display: flex; flex-direction: column; }
        .main-content { flex: 1 0 auto; display: flex; align-items: center; justify-content: center; background: #f4f6fa; }
        .register-container {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 32px 28px 24px 28px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.12);
        }
        .header-blue {
            width: 100vw;
            height: 56px;
            background: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
        }
        .header-blue-title {
            color: #fff;
            font-size: 1.35rem;
            font-weight: 700;
            margin-left: 2rem;
            letter-spacing: 1px;
        }
        .register-title {
            font-weight: 700;
            color: #0d6efd;
            margin-bottom: 24px;
        }
        .form-label {
            font-weight: 500;
        }
        .btn-primary {
            width: 100%;
            font-weight: 600;
            border-radius: 8px;
        }
        .alert {
            font-size: 0.98rem;
            border-radius: 8px;
        }
        .form-control:focus {
            box-shadow: 0 0 0 2px #0d6efd33;
            border-color: #0d6efd;
        }
        .main-content { margin-top: 56px; }
        footer {
            flex-shrink: 0;
            width: 100%;
            background: #343a40;
            color: #fff;
            padding: 2rem 0;
            margin-top: auto;
        }
        footer h5, footer h6 {
            color: #f8f9fa;
        }
        footer a {
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <div class="main-content d-flex justify-content-center align-items-center" style="margin-top:56px; min-height:calc(100vh - 56px); background:#f4f6fa;">
        <div class="row w-100 justify-content-center align-items-center" style="max-width:1100px;">
            <div class="col-md-6 d-flex flex-column align-items-start justify-content-center mb-4 mb-md-0">
                <div class="ps-md-5">
                    <div style="font-size:3.2rem;font-weight:900;color:#0d6efd;line-height:1.15;">Mari Melihat<br>Lintas Terkini<br>Bersama Kami</div>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="register-container">
                    <h2 class="text-center register-title">Daftar Akun</h2>
                    @if($errors->any())
                        <div class="alert alert-danger text-center mb-3">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register.post') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Daftar</button>
                    </form>
                    <div class="text-center mt-3">
                        <span>Sudah punya akun?</span>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary ms-2">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-primary text-white mt-5 py-4" style="flex-shrink:0;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <h5>About Me</h5>
                    <p>GoodNews adalah website berita terpercaya yang menyajikan informasi terkini seputar bisnis, politik, hiburan, dan teknologi.</p>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <h6>Kontak</h6>
                    <ul class="list-unstyled" style="font-size:1.05em;">
                        <li class="mb-2"><span style="color:#fff;"><i class="bi bi-geo-alt-fill"></i></span> Jl. Merdeka No. 123, Jakarta</li>
                        <li class="mb-2"><span style="color:#fff;"><i class="bi bi-telephone-fill"></i></span> (021) 123-4567</li>
                        <li><span style="color:#fff;"><i class="bi bi-envelope-fill"></i></span> info@goodnews.co.id</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Tentang Perusahaan</h6>
                    <ul class="list-unstyled">
                        <li>PT. Media Digital Nusantara</li>
                        <li>Didirikan: 2020</li>
                        <li>Website: www.goodnews.co.id</li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-3" style="font-size:0.95em;">&copy; 2025 GoodNews. All rights reserved.</div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
