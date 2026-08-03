<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard | OneGoBike</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="dashboard-shell d-flex">
    <aside class="sidebar">
        <div class="brand">OneGoBike Admin</div>
        <nav class="sidebar-nav">
            <a class="active" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="#">Operations</a>
            <a href="#">Volunteer Hub</a>
            <a href="#">Reports</a>
            <a href="#">Settings</a>
        </nav>
    </aside>

    <main class="main-panel">
        <div class="topbar">
            <div>
                <h1 style="margin:0; font-size:1.6rem;">Real-Time Response Map</h1>
                <p style="margin:.3rem 0 0; color:#94a3b8;">Welcome back, {{ auth()->user()->name ?? 'Admin' }}.</p>
            </div>
            <a class="btn" href="{{ route('logout') }}">Logout</a>
        </div>

        <div class="stat-grid">
            <div class="stat-card">
                <div class="label">Active Volunteers</div>
                <div class="value" id="volunteer-count">0</div>
            </div>
            <div class="stat-card">
                <div class="label">Community Members</div>
                <div class="value" id="community-count">0</div>
            </div>
            <div class="stat-card">
                <div class="label">Emergency Requests</div>
                <div class="value" id="emergency-count">0</div>
            </div>
            <div class="stat-card">
                <div class="label">Offline Units</div>
                <div class="value" id="offline-count">0</div>
            </div>
        </div>

        <section class="map-card">
            <header>
                <div>
                    <h2 style="margin:0; font-size:1.1rem;">Live Coordinator Map</h2>
                    <p style="margin:.25rem 0 0; color:#94a3b8;">Auto-refreshing every 5 seconds.</p>
                </div>
                <span style="color:#94a3b8; font-size:.9rem;">Updated live</span>
            </header>
            <div id="map"></div>
            <div class="legend">
                <span><i class="dot" style="background:#22c55e"></i> Active Volunteer</span>
                <span><i class="dot" style="background:#3b82f6"></i> Community Member</span>
                <span><i class="dot" style="background:#ef4444"></i> Emergency Request</span>
                <span><i class="dot" style="background:#94a3b8"></i> Offline</span>
            </div>
        </section>
    </main>
</div>


</body>
</html>
