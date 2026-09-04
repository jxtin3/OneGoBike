<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Live GoBiker Map | OneGoBike</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="dashboard-shell d-flex">
    <aside class="sidebar">
        <div class="brand">OneGoBike <span>ADMIN</span></div>
        <nav class="sidebar-nav" aria-label="Admin navigation">
            <a class="active" href="{{ route('admin.dashboard') }}">Live Map</a>
            <a href="{{ route('admin.operations') }}">Operations</a>
            <a href="#">Reports</a>
        </nav>
    </aside>

    <main class="main-panel">
        <div class="topbar">
            <div>
                <p class="eyebrow">FIELD OPERATIONS / LIVE MONITORING</p>
                <h1>GoBiker locations</h1>
                <p class="welcome">Welcome back, {{ auth()->user()->name ?? 'Admin' }}. Monitor active riders as they move through their assigned areas.</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button">Log out</button>
            </form>
        </div>

        <div class="stat-grid" aria-label="GoBiker statistics">
            <div class="stat-card"><span class="stat-mark mark-total"></span><div><div class="label">Total GoBikers</div><div class="value" id="total-count">0</div></div></div>
            <div class="stat-card"><span class="stat-mark mark-active"></span><div><div class="label">Active GoBikers</div><div class="value" id="active-count">0</div></div></div>
            <div class="stat-card"><span class="stat-mark mark-responding"></span><div><div class="label">Responding</div><div class="value" id="responding-count">0</div></div></div>
            <div class="stat-card"><span class="stat-mark mark-offline"></span><div><div class="label">Offline</div><div class="value" id="offline-count">0</div></div></div>
        </div>

        <section class="map-card" aria-label="Live GoBiker map">
            <header class="map-header">
                <div><h2>Live map</h2><p>Location data refreshes every 5 seconds.</p></div>
                <span id="last-refresh" class="refresh-status">Waiting for data</span>
            </header>
            <div class="map-toolbar">
                <label class="search-field"><span>Search</span><input id="gobiker-search" type="search" placeholder="Search GoBiker by name"></label>
                <label><span>Status</span><select id="status-filter"><option value="all">All statuses</option><option value="active">Active</option><option value="responding">Responding</option><option value="emergency">Emergency</option><option value="offline">Offline</option></select></label>
                <label><span>Barangay</span><select id="barangay-filter"><option value="all">All barangays</option></select></label>
                <button id="fit-map" class="map-button" type="button">Fit active</button>
                <button id="locate-map" class="map-button" type="button">Locate me</button>
            </div>
            <div id="map"></div>
            <p id="map-error" class="map-error" role="status"></p>
            <div class="legend"><span><i class="dot active-dot"></i>Active</span><span><i class="dot responding-dot"></i>Responding</span><span><i class="dot emergency-dot"></i>Emergency</span><span><i class="dot offline-dot"></i>Offline</span></div>
        </section>
    </main>
</div>
</body>
</html>
