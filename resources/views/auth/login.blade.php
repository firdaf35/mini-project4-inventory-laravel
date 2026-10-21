<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Bloom & Co.</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f1eb; display: grid; place-items: center; min-height: 100vh; margin: 0; color: #4e4039; }
        form { background: white; padding: 32px; border-radius: 14px; width: min(90%, 360px); box-shadow: 0 5px 25px #0001; }
        h1 { color: #795b50; } label { display: block; margin: 14px 0 6px; }
        input { width: 100%; padding: 11px; box-sizing: border-box; border: 1px solid #d9c8bb; border-radius: 7px; }
        button { margin-top: 20px; width: 100%; padding: 12px; background: #8d695b; color: white; border: 0; border-radius: 7px; cursor: pointer; }
        .error { color: #a33; }
    </style>
</head>
<body>
<form method="POST" action="{{ route('login.post') }}">
    @csrf
    <h1>Bloom & Co. 🌷</h1>
    <p>Inventory Management System</p>
    @if($errors->any())
        <p class="error">{{ $errors->first() }}</p>
    @endif
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required autofocus>
    <label>Password</label>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
    <p><small>Demo: admin@bloomco.test / password123</small></p>
</form>
</body>
</html>