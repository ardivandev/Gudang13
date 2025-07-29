<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    @if ($errors->any())
        <div>
            <strong>{{ $errors->first() }}</strong>
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf
        <label>Email:</label><br>
        <input type="email" name="email"><br><br>
        
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        
        <button type="submit">Login</button>
        <p>jika belum <a href="/register">Daftar</a></p>
    </form>
</body>
</html>
