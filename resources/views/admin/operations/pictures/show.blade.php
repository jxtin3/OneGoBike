@extends('admin.operations.layout')
@section('title','Picture Details')
@section('heading','Picture Details')
@section('content')

<div style="max-width:820px;display:grid;gap:1.5rem;">

    {{-- Image preview --}}
    <div style="background:rgba(15,23,42,.92);border:1px solid rgba(148,163,184,.18);border-radius:12px;overflow:hidden;">
        <img src="{{ asset('storage/'.$picture->image_path) }}"
             alt="{{ $picture->title }}"
             style="width:100%;max-height:420px;object-fit:contain;background:#07111f;display:block;">
    </div>

    {{-- Details card --}}
    <div style="background:rgba(15,23,42,.92);border:1px solid rgba(148,163,184,.18);border-radius:12px;padding:1.5rem;display:grid;gap:1rem;">
        <div>
            <span style="color:#2FA7FF;font-size:.7rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;">Title</span>
            <p style="margin:.25rem 0 0;font-size:1.2rem;font-weight:700;color:#f1f5f9;">{{ $picture->title }}</p>
        </div>

        @if($picture->description)
        <div>
            <span style="color:#2FA7FF;font-size:.7rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;">Description</span>
            <p style="margin:.25rem 0 0;color:#cbd5e1;line-height:1.7;">{{ $picture->description }}</p>
        </div>
        @endif

        <div style="display:flex;gap:2rem;padding-top:.5rem;border-top:1px solid rgba(148,163,184,.12);">
            <div>
                <span style="color:#64748b;font-size:.75rem;text-transform:uppercase;letter-spacing:.08em;">Uploaded By</span>
                <p style="margin:.2rem 0 0;font-weight:600;color:#e2e8f0;">{{ $picture->uploader?->name ?? 'Unknown' }}</p>
            </div>
            <div>
                <span style="color:#64748b;font-size:.75rem;text-transform:uppercase;letter-spacing:.08em;">Upload Date</span>
                <p style="margin:.2rem 0 0;font-weight:600;color:#e2e8f0;">{{ $picture->created_at->format('F d, Y') }}</p>
            </div>
        </div>

        <div style="display:flex;gap:.75rem;padding-top:.5rem;">
            <a class="primary-button" href="{{ route('admin.operations.pictures.edit', $picture) }}">Edit Picture</a>
            <a class="map-button" href="{{ route('admin.operations.pictures.index') }}">← Back to Pictures</a>
        </div>
    </div>

</div>

@endsection
