<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin:0; background:#f8fafc; color:#0f172a; }
        .shell { max-width: 1120px; margin:0 auto; padding:2rem; }
        .topbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:2rem; }
        .card-grid { display:grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap:1rem; }
        .card { background:#fff; border-radius:16px; padding:1.25rem; box-shadow: 0 10px 30px rgba(15,23,42,.08); }
        .btn { display:inline-block; padding:.7rem 1rem; background:#0f172a; color:#fff; text-decoration:none; border-radius:10px; }
        .muted { color:#64748b; }
    </style>
</head>
<body>
    <div class="shell">
        <div class="topbar">
            <div>
                <h1>Admin Dashboard</h1>
                <p class="muted">Welcome back, {{ auth()->user()->name ?? 'Admin' }}.</p>
            </div>
            <a class="btn" href="{{ route('logout') }}">Logout</a>
        </div>

        <div class="card-grid">
            <div class="card">
                <h3>Website Overview</h3>
                <p class="muted">Monitor your site sections and published content.</p>
            </div>
            <div class="card">
                <h3>News Management</h3>
                <p class="muted">Review and publish the latest updates.</p>
            </div>
            <div class="card">
                <h3>Quick Actions</h3>
                <p class="muted">Use this space to add future admin tools.</p>
            </div>
        </div>
    </div>
</body>
</html>
