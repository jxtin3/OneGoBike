<style>
.pic-form { max-width: 640px; display: grid; gap: 1.5rem; }
.pic-form .field { display: grid; gap: .45rem; }
.pic-form .field-label {
    font-size: .78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .09em;
    color: #94a3b8;
}
.pic-form input[type="text"],
.pic-form textarea,
.pic-form input[type="file"] {
    width: 100%;
    box-sizing: border-box;
    border: 1px solid rgba(148,163,184,.22);
    border-radius: 8px;
    padding: .75rem .9rem;
    color: #e2e8f0;
    background: #0b1729;
    font-size: .95rem;
    font-family: inherit;
    transition: border-color .2s;
    outline: none;
}
.pic-form input:focus,
.pic-form textarea:focus {
    border-color: #2FA7FF;
    box-shadow: 0 0 0 3px rgba(47,167,255,.12);
}
.pic-form textarea { resize: vertical; min-height: 90px; }
.pic-form .counter {
    font-size: .72rem;
    color: #475569;
    text-align: right;
    margin-top: .2rem;
    transition: color .2s;
}
.pic-form .form-preview {
    max-width: 100%;
    max-height: 240px;
    object-fit: contain;
    border-radius: 8px;
    border: 1px solid rgba(148,163,184,.15);
    background: #07111f;
    display: block;
}
.pic-form .form-actions { display: flex; gap: .75rem; align-items: center; padding-top: .25rem; }
.pic-form-card {
    background: rgba(15,23,42,.92);
    border: 1px solid rgba(148,163,184,.18);
    border-radius: 12px;
    padding: 1.75rem;
}
</style>

<div class="pic-form-card" style="max-width:640px;">
    <form class="pic-form" action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($method !== 'POST') @method($method) @endif

        {{-- Title --}}
        <div class="field">
            <label class="field-label" for="pic-title">Title</label>
            <input id="pic-title" type="text" name="title" required maxlength="30"
                   value="{{ old('title', $picture?->title) }}"
                   placeholder="Short descriptive title..."
                   oninput="updateCounter(this, 'title-count', 30)">
            <div class="counter" id="title-count">
                {{ strlen(old('title', $picture?->title ?? '')) }}/30
            </div>
        </div>

        {{-- Description --}}
        <div class="field">
            <label class="field-label" for="pic-desc">Description <span style="color:#475569;font-weight:400;text-transform:none;letter-spacing:0;">(optional)</span></label>
            <textarea id="pic-desc" name="description" maxlength="50" rows="3"
                      placeholder="Brief caption for this photo..."
                      oninput="updateCounter(this, 'desc-count', 50)">{{ old('description', $picture?->description) }}</textarea>
            <div class="counter" id="desc-count">
                {{ strlen(old('description', $picture?->description ?? '')) }}/50
            </div>
        </div>

        {{-- Image Upload --}}
        <div class="field">
            <label class="field-label" for="pic-image">
                {{ $picture ? 'Replace Image' : 'Upload Image' }}
                <span style="color:#475569;font-weight:400;text-transform:none;letter-spacing:0;">(JPG, PNG, WebP · max 5 MB)</span>
            </label>
            @if($picture)
                <img class="form-preview" src="{{ asset('storage/'.$picture->image_path) }}" alt="{{ $picture->title }}">
            @endif
            <input id="pic-image" type="file" name="image" accept="image/jpeg,image/png,image/webp" {{ $picture ? '' : 'required' }}>
        </div>

        {{-- Actions --}}
        <div class="form-actions">
            <button class="primary-button" type="submit">{{ $button }}</button>
            <a class="map-button" href="{{ route('admin.operations.pictures.index') }}">Cancel</a>
        </div>
    </form>
</div>

<script>
function updateCounter(el, counterId, max) {
    const count = el.value.length;
    const counter = document.getElementById(counterId);
    if (!counter) return;
    counter.textContent = count + '/' + max;
    counter.style.color = count >= max ? '#ef4444' : count >= max * 0.85 ? '#f97316' : '#475569';
}
</script>
