<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            height: 100vh;
        }

        .register-box {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px;
            width: 100%;
        }

        .register-image img {
            width: 120px;
            height: auto;
            margin-bottom: 20px;
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
                <ul class="mb-0">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="register-box text-center">
            <!-- GAMBAR -->
            <div class="register-image">
                <img src="{{ asset('images/register.png') }}" alt="Register Image">
            </div>

            <!-- FORM -->
            <h2 class="mb-4 text-success">Daftar Akun</h2>
            <form action="{{ url('/register') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required>
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required>
                </div>

                <div class="mb-4 text-start">
                    <label class="form-label">Gambar Jaminan</label>
                    <input type="file" class="form-control" name="gambar_jaminan">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-green">Daftar</button>
                </div>

                <p class="mt-3 text-center">
                    Sudah punya akun? <a href="/login" class="text-success">Login</a>
                </p>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        setTimeout(function () {
            let alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = 0;
                setTimeout(() => alert.remove(), 2000);
            });
        }, 3000);
    </script>
</body>
</html>
