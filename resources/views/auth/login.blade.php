<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            height: 100vh;
        }
        .login-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 128, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        .btn-green {
            background-color: #4caf50;
            color: white;
        }
        .btn-green:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>
    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="d-flex justify-content-center mt-4">
            <div class="alert alert-success text-center w-50" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif

    {{-- Notifikasi error --}}
    @if ($errors->any())
        <div class="d-flex justify-content-center mt-4">
            <div class="alert alert-danger text-center w-50" role="alert">
                {{ $errors->first() }}
            </div>
        </div>
    @endif

    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="login-box">
            <h2 class="text-center text-success mb-4">Login</h2>
            <form method="POST" action="/login">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-green">Login</button>
                </div>

                <p class="mt-3 text-center">
                    Belum punya akun? <a href="/register" class="text-success">Daftar di sini</a>
                </p>
            </form>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    {{-- Script menghilangkan alert --}}
    <script>
        setTimeout(function () {
            let alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = 0;
                setTimeout(() => alert.remove(), 500);
            });
        }, 3000); // 3 detik
    </script>
</body>
</html>
