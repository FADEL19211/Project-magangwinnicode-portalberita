<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        html, body { height: 100%; }
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1500&q=80') no-repeat center center fixed;
            background-size: cover;
            filter: none;
        }
        .login-blur-bg {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(4px);
            z-index: 0;
        }
        .main-content { flex: 1 0 auto; display: flex; align-items: center; justify-content: center; position: relative; z-index: 1; }
        .login-container { width: 100%; max-width: 400px; background: #fff; padding: 32px 28px 24px 28px; border-radius: 16px; box-shadow: 0 8px 32px rgba(0,0,0,0.12); }
        .login-title { font-weight: 700; color: #0d6efd; margin-bottom: 24px; }
        .form-label { font-weight: 500; }
        .input-group-text { background: #e9ecef; }
        .btn-primary { width: 100%; font-weight: 600; border-radius: 8px; }
        .btn-outline-primary { border-radius: 8px; }
        .alert { font-size: 0.98rem; border-radius: 8px; }
        .form-control:focus { box-shadow: 0 0 0 2px #0d6efd33; border-color: #0d6efd; }
        footer { flex-shrink: 0; }
    </style>
</head>
<body>
    <div class="login-blur-bg"></div>
    <div class="main-content" style="margin-top:56px;">
        <div class="login-container">
            <h2 class="text-center login-title">Login</h2>
            @if($errors->any())
                <div class="alert alert-danger text-center mb-3">
                    {{ $errors->first() }}
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success text-center mb-3">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required autofocus>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Login</button>
            </form>
            <div class="text-center mt-3">
                <span>Belum punya akun?</span>
                <a href="{{ route('register') }}" class="btn btn-outline-primary ms-2">Daftar</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
