<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Garuda-Hub</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
    <!-- NIM: 252410102033 -->
    <h1>Login</h1>

    @if ($errors->any())
        <ul class="error">
            @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('login.attempt') }}">
        @csrf
        <p>Email: <input type="email" name="email" value="{{ old('email') }}"></p>
        <p>Password: <input type="password" name="password"></p>
        <button type="submit">Masuk</button>
    </form>
</body>
</html>