<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Operations') | OneGoBike</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="dashboard-shell d-flex">
        <aside class="sidebar">
            <div class="brand">OneGoBike <span>ADMIN</span></div>
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}">Live Map</a>
                <a class="{{ request()->routeIs('admin.operations*') ? 'active' : '' }}" href="{{ route('admin.operations') }}">Operations</a>
                <a href="#">Reports</a>
            </nav>
        </aside>

        <main class="main-panel">
            <div class="topbar">
                <div>
                    @if(request()->routeIs('admin.operations.*'))
                        <a href="{{ route('admin.operations') }}" class="back-link">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                            </svg>
                            Back to Operations
                        </a>
                    @elseif(request()->routeIs('admin.operations'))
                        <a href="{{ route('admin.dashboard') }}" class="back-link">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                            </svg>
                            Back to Live Map
                        </a>
                    @else
                        <button type="button" onclick="window.history.back()" class="back-link">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                            </svg>
                            Back
                        </button>
                    @endif
                    <p class="eyebrow">FIELD OPERATIONS / ADMINISTRATION</p>
                    <h1>@yield('heading', 'Operations')</h1>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="logout-button">Log out</button>
                </form>
            </div>

            @if(session('success'))
                <div class="alert success">{{ session('success') }}</div>
            @endif 
            @if(session('error'))
                <div class="alert error">{{ session('error') }}</div>
            @endif 
            @if($errors->any())
                <div class="alert error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 

            @yield('content')
        </main>
    </div>
</body>
</html>
