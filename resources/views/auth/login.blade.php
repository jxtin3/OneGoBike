<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #0f172a; color: #f8fafc; margin: 0; padding: 0; }
        .wrapper { min-height: 100vh; display: grid; place-items: center; padding: 2rem; }
        .card { width: min(100%, 420px); background: #111827; padding: 2rem; border-radius: 16px; box-shadow: 0 10px 40px rgba(0,0,0,.3); }
        h1 { margin-top:0; margin-bottom: .5rem; font-size: 1.6rem; }
        p { color: #cbd5e1; }
        label { display:block; margin-bottom:.4rem; font-weight:600; }
        input { width:100%; padding:.8rem; border-radius: 10px; border:1px solid #334155; margin-bottom:1rem; background:#020617; color:#fff; }
        button { width:100%; padding:.8rem 1rem; border:none; border-radius:10px; background:#22c55e; color:#052e16; font-weight:700; cursor:pointer; }
        .error { background:#7f1d1d; padding:.75rem; border-radius:10px; margin-bottom:1rem; color:#fee2e2; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="card">
            <h1>Admin Login</h1>
            <p>Access the administrative dashboard.</p>

            @if ($errors->any())
                <div class="error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required>

                <label for="password">Password</label>
                <input id="password" name="password" type="password" required>

                <button type="submit">Sign In</button>
            </form>
        </div>
    </div>
</body>
</html>
