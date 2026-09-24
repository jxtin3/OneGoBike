@extends('admin.operations.layout')
@section('title', 'Messages')
@section('heading', 'Contact messages')
@section('content')
<div class="page-actions">
    <form class="search-form">
        <input name="search" value="{{ request('search') }}" placeholder="Search name, email or message...">
        <button class="map-button">Search</button>
    </form>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Topic</th>
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $item)
            @php
                $topic = in_array(strtolower($item->subject ?? ''), ['others', 'other'])
                    ? 'Others'
                    : ucfirst($item->subject ?? '—');
            @endphp
            <tr class="message-row" style="cursor: pointer;"
                data-name="{{ $item->name }}"
                data-email="{{ $item->email }}"
                data-phone="{{ $item->phone }}"
                data-topic="{{ $topic }}"
                data-received="{{ $item->created_at->format('M d, Y g:i A') }}"
                data-status="{{ $item->is_read ? 'Read' : 'Unread' }}"
                data-is-read="{{ $item->is_read ? '1' : '0' }}"
                data-message="{{ $item->message }}"
                data-read-url="{{ route('admin.operations.messages.read', $item) }}"
                data-delete-url="{{ route('admin.operations.messages.destroy', $item) }}">
                <td><strong>{{ $item->name }}</strong></td>
                <td>{{ $item->email }}</td>
                <td><span class="topic-tag">{{ $topic }}</span></td>
                <td class="actions">
                    <button type="button" class="map-button view-message">View</button>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="empty-state">No messages found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
{{ $messages->links() }}

<dialog id="msgModal" class="msg-modal">
    <div class="msg-inner">
        <div class="msg-head">
            <div>
                <h3 id="mm-name"></h3>
                <span id="mm-status" class="status-pill"></span>
            </div>
            <button type="button" id="mm-close" aria-label="Close">×</button>
        </div>
        <div class="msg-meta">
            <div><span>Email</span><b id="mm-email"></b></div>
            <div><span>Phone</span><b id="mm-phone"></b></div>
            <div><span>Topic</span><b id="mm-topic"></b></div>
            <div><span>Received</span><b id="mm-received"></b></div>
        </div>
        <div class="msg-body-wrapper">
            <span class="msg-body-label">Message Content</span>
            <p id="mm-message" class="msg-body"></p>
        </div>
        <div class="msg-foot">
            <button type="button" id="open-delete-confirm" class="danger-button">Delete Message</button>
            <a id="mm-reply" class="primary-button" href="#" target="_blank">Reply by Email</a>
        </div>
    </div>
</dialog>

<dialog id="confirmDeleteModal" class="confirm-modal">
    <div class="confirm-inner">
        <div class="confirm-icon">
            <svg style="width:24px;height:24px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </div>
        <h3>Delete Message?</h3>
        <p>Are you sure you want to delete the message from <strong id="cd-name"></strong>? This action cannot be undone.</p>
        <div class="confirm-actions">
            <button type="button" id="cd-cancel" class="cancel-button">Cancel</button>
            <form id="cd-form" method="POST" action="">
                @csrf
                @method('DELETE')
                <button type="submit" class="danger-button">Yes, Delete</button>
            </form>
        </div>
    </div>
</dialog>

<style>
    .topic-tag { display: inline-block; padding: 2px 8px; border-radius: 4px; background: rgba(255,255,255,.06); font-size: 13px; }
    .message-row:hover { background: rgba(255,255,255,.03); }
    .msg-modal { margin: auto; padding: 0; width: min(780px, 94vw); max-height: 88vh; overflow: auto;
        background: #0f1a2e; color: #e5e7eb; border: 1px solid rgba(255,255,255,.14); border-radius: 14px; box-shadow: 0 30px 60px rgba(0,0,0,0.6); }
    .msg-modal::backdrop { background: rgba(0,0,0,.75); backdrop-filter: blur(5px); }
    .msg-inner { padding: 32px 36px; }
    .msg-head { display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; margin-bottom: 24px; border-bottom: 1px solid rgba(255,255,255,.08); padding-bottom: 16px; }
    .msg-head h3 { font-size: 24px; font-weight: 700; color: #fff; margin-bottom: 6px; }
    .msg-head button { background: none; border: 0; color: #94a3b8; font-size: 30px; line-height: 1; cursor: pointer; transition: color .2s; }
    .msg-head button:hover { color: #fff; }
    .msg-meta { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 16px 24px; margin-bottom: 24px; background: rgba(255,255,255,.02); padding: 18px 20px; border-radius: 8px; border: 1px solid rgba(255,255,255,.04); }
    .msg-meta span { display: block; font-size: 11px; letter-spacing: .12em; text-transform: uppercase; color: #64748b; margin-bottom: 4px; }
    .msg-meta b { font-weight: 600; word-break: break-word; color: #cbd5e1; font-size: 14px; }
    .msg-body-wrapper { margin-bottom: 24px; }
    .msg-body-label { display: block; font-size: 11px; letter-spacing: .12em; text-transform: uppercase; color: #64748b; margin-bottom: 8px; }
    .msg-body { white-space: pre-wrap; word-break: break-word; line-height: 1.7; padding: 22px 24px;
        background: rgba(255,255,255,.04); border: 1px solid rgba(255,255,255,.06); border-radius: 10px; color: #f8fafc; font-size: 15px; min-height: 120px; }
    .msg-foot { display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-top: 24px; padding-top: 18px; border-top: 1px solid rgba(255,255,255,.08); }
    .danger-button { background: #ef4444; color: #fff; border: 0; padding: 11px 20px; border-radius: 6px; font-weight: 600; cursor: pointer; font-size: 14px; transition: background .2s; }
    .danger-button:hover { background: #dc2626; }

    /* Delete Confirm Modal */
    .confirm-modal { margin: auto; padding: 0; width: min(420px, 90vw); border: 1px solid rgba(255,255,255,.12); border-radius: 12px; background: #0f1a2e; color: #e5e7eb; box-shadow: 0 25px 60px rgba(0,0,0,0.6); }
    .confirm-modal::backdrop { background: rgba(0,0,0,.75); backdrop-filter: blur(4px); }
    .confirm-inner { padding: 24px; text-align: center; }
    .confirm-icon { width: 48px; height: 48px; border-radius: 50%; background: rgba(239,68,68,.15); color: #ef4444; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; }
    .confirm-inner h3 { font-size: 20px; font-weight: 700; color: #fff; margin-bottom: 8px; }
    .confirm-inner p { font-size: 14px; color: #94a3b8; line-height: 1.5; margin-bottom: 24px; }
    .confirm-inner p strong { color: #f1f5f9; }
    .confirm-actions { display: flex; gap: 12px; justify-content: center; }
    .cancel-button { background: rgba(255,255,255,.08); color: #cbd5e1; border: 0; padding: 10px 18px; border-radius: 6px; font-weight: 600; cursor: pointer; font-size: 13px; transition: background .2s; }
    .cancel-button:hover { background: rgba(255,255,255,.15); color: #fff; }
</style>

<script>
(function () {
    const modal = document.getElementById('msgModal');
    const confirmModal = document.getElementById('confirmDeleteModal');
    const csrf = document.querySelector('meta[name="csrf-token"]')?.content ?? '';
    const set = (id, value) => { document.getElementById(id).textContent = value || '—'; };
    let currentDeleteUrl = '';
    let currentSenderName = '';

    function openModal(row) {
        currentSenderName = row.dataset.name;
        currentDeleteUrl = row.dataset.deleteUrl;

        set('mm-name', row.dataset.name);
        set('mm-email', row.dataset.email);
        set('mm-phone', row.dataset.phone);
        set('mm-topic', row.dataset.topic);
        set('mm-received', row.dataset.received);
        set('mm-message', row.dataset.message);
        
        const statusEl = document.getElementById('mm-status');
        const isRead = row.dataset.isRead === '1';
        statusEl.textContent = isRead ? 'Read' : 'Unread';
        statusEl.className = 'status-pill ' + (isRead ? 'published' : 'draft');

        document.getElementById('mm-reply').href = 'mailto:' + row.dataset.email;
        modal.showModal();

        if (!isRead) {
            fetch(row.dataset.readUrl, {
                method: 'PATCH',
                headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrf },
            }).then(res => {
                if (res.ok) {
                    row.dataset.isRead = '1';
                    statusEl.textContent = 'Read';
                    statusEl.className = 'status-pill published';
                }
            }).catch(() => {});
        }
    }

    document.querySelectorAll('.message-row').forEach(function (row) {
        row.addEventListener('click', function (e) {
            openModal(row);
        });
    });

    document.getElementById('open-delete-confirm').addEventListener('click', function () {
        document.getElementById('cd-name').textContent = currentSenderName;
        document.getElementById('cd-form').action = currentDeleteUrl;
        confirmModal.showModal();
    });

    document.getElementById('cd-cancel').addEventListener('click', function () {
        confirmModal.close();
    });

    document.getElementById('mm-close').addEventListener('click', function () { modal.close(); });
    modal.addEventListener('click', function (e) { if (e.target === modal) modal.close(); });
    confirmModal.addEventListener('click', function (e) { if (e.target === confirmModal) confirmModal.close(); });
})();
</script>
@endsection

