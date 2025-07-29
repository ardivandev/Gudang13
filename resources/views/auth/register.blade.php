<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Register</title>
</head>
<body>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card_gambar">
            <img src="{{ asset('images/register.png') }}" alt="Register Image" class="gambar_register">
        </div>
        <div class="card_form">
            <form action="{{ url('/register') }}" method="POST" enctype="multipart/form-data">
                <h2>Daftar Akun</h2>
                @csrf
                <div class="card_input">
                    <input type="text" name="nama_lengkap" placeholder="Masukan Nama Lengkap..." required><br><br>
                </div>
                
                <label>Email:</label><br>
                <input type="email" name="email" required><br><br>

                <label>Username:</label><br>
                <input type="text" name="username" required><br><br>

                <label>Password:</label><br>
                <input type="password" name="password" required><br><br>

                <label>Konfirmasi Password:</label><br>
                <input type="password" name="password_confirmation" required><br><br>

                <label>Gambar Jaminan</label><br>
                <input type="file" name="gambar_jaminan"><br><br>

                <button type="submit">Daftar</button>
            </form>
            <p>Sudah punya akun? <a href="/login">Login</a></p>
        </div>
    </div>
</body>
</html>