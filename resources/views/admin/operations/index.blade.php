@extends('admin.operations.layout')
@section('title','Operations')
@section('heading','Operations')
@section('content')
<div class="stat-grid"><div class="stat-card"><div><div class="label">Total News</div><div class="value">{{ $newsCount }}</div></div></div><div class="stat-card"><div><div class="label">Published News</div><div class="value">{{ $publishedNewsCount }}</div></div></div><div class="stat-card"><div><div class="label">Total Pictures</div><div class="value">{{ $pictureCount }}</div></div></div><div class="stat-card"><div><div class="label">Active Users</div><div class="value">{{ $activeUserCount }} / {{ $userCount }}</div></div></div></div>
<div class="management-grid"><a class="management-card" href="{{ route('admin.operations.news.index') }}"><span>NEWS</span><h2>Manage OneGoBike news</h2><b>Open management →</b></a><a class="management-card" href="{{ route('admin.operations.pictures.index') }}"><span>PICTURES</span><h2>Manage gallery pictures</h2><b>Open management →</b></a><a class="management-card" href="{{ route('admin.operations.users.index') }}"><span>USERS</span><h2>Manage system users</h2><b>Open management →</b></a></div>
@endsection
