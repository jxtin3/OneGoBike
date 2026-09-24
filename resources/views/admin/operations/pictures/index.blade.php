@extends('admin.operations.layout')
@section('title','Pictures')
@section('heading','Picture Management')
@section('content')

<div class="page-actions">
    <form class="search-form" method="GET" action="{{ route('admin.operations.pictures.index') }}">
        <input name="search" value="{{ request('search') }}" placeholder="Search pictures by title...">
        <button class="map-button" type="submit">Search</button>
        @if(request('search'))
            <a href="{{ route('admin.operations.pictures.index') }}" class="map-button">Clear</a>
        @endif
    </form>
    <a class="primary-button" href="{{ route('admin.operations.pictures.create') }}">+ Add Picture</a>
</div>

@if($pictures->isEmpty())
    <div class="empty-state" style="padding:3rem;text-align:center;background:rgba(15,23,42,.92);border:1px solid rgba(148,163,184,.18);border-radius:10px;">
        <svg style="width:48px;height:48px;color:#334155;margin-bottom:1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        <p style="color:#64748b;margin:0;">No pictures uploaded yet. <a href="{{ route('admin.operations.pictures.create') }}" style="color:#2FA7FF;">Upload the first one →</a></p>
    </div>
@else
    <div class="picture-grid" style="grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:1.25rem;">
        @foreach($pictures as $picture)
            <article class="picture-card" style="display:flex;flex-direction:column;">
                <div style="position:relative;overflow:hidden;height:180px;background:#0b1729;">
                    <img src="{{ asset('storage/'.$picture->image_path) }}"
                         alt="{{ $picture->title }}"
                         style="width:100%;height:100%;object-fit:cover;transition:transform .4s ease;"
                         onmouseover="this.style.transform='scale(1.05)'"
                         onmouseout="this.style.transform='scale(1)'">
                    <div style="position:absolute;top:.6rem;right:.6rem;">
                        <span style="background:rgba(7,17,31,.75);border:1px solid rgba(148,163,184,.2);border-radius:6px;padding:.2rem .55rem;font-size:.7rem;color:#94a3b8;">
                            {{ $picture->created_at->format('M d, Y') }}
                        </span>
                    </div>
                </div>

                <div style="padding:1rem;display:flex;flex-direction:column;flex:1;gap:.4rem;">
                    <h2 style="margin:0;font-size:1rem;font-weight:700;color:#f1f5f9;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" title="{{ $picture->title }}">
                        {{ $picture->title }}
                    </h2>
                    @if($picture->description)
                        <p style="margin:0;font-size:.82rem;color:#64748b;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;">
                            {{ $picture->description }}
                        </p>
                    @else
                        <p style="margin:0;font-size:.82rem;color:#334155;font-style:italic;">No description</p>
                    @endif

                    <div style="margin-top:auto;padding-top:.75rem;border-top:1px solid rgba(148,163,184,.12);display:flex;gap:.5rem;align-items:center;">
                        <a href="{{ route('admin.operations.pictures.show', $picture) }}"
                           style="flex:1;text-align:center;padding:.45rem .5rem;border-radius:7px;background:rgba(47,167,255,.12);border:1px solid rgba(47,167,255,.25);color:#67c3ff;font-size:.8rem;font-weight:600;">
                            View
                        </a>
                        <a href="{{ route('admin.operations.pictures.edit', $picture) }}"
                           style="flex:1;text-align:center;padding:.45rem .5rem;border-radius:7px;background:rgba(148,163,184,.08);border:1px solid rgba(148,163,184,.2);color:#cbd5e1;font-size:.8rem;font-weight:600;">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('admin.operations.pictures.destroy', $picture) }}"
                              onsubmit="return confirm('Delete this picture? This cannot be undone.')" style="flex:1;">
                            @csrf @method('DELETE')
                            <button type="submit"
                                    style="width:100%;padding:.45rem .5rem;border-radius:7px;background:rgba(239,68,68,.1);border:1px solid rgba(239,68,68,.25);color:#fca5a5;font-size:.8rem;font-weight:600;cursor:pointer;">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    <div style="margin-top:1.5rem;">
        {{ $pictures->links() }}
    </div>
@endif

@endsection
