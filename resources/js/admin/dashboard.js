// Initialize the admin map only when the dashboard page includes the map container.
(function() {
    const mapElement = document.getElementById('map');

    if (!mapElement) {
        console.info('Admin dashboard map container not found.');
        return;
    }

    // Wait for Leaflet to be available from CDN
    if (typeof L === 'undefined') {
        console.error('Leaflet library not loaded');
        return;
    }

    const map = L.map('map').setView([16.0435, 120.3334], 12);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors',
        maxZoom: 19,
    }).addTo(map);

    const markersById = new Map();
    const markerColors = {
        Volunteer: '#22c55e',
        Community: '#3b82f6',
        Emergency: '#ef4444',
        Offline: '#94a3b8',
    };

    function getMarkerColor(item) {
        if (item.status === 'Offline') return markerColors.Offline;
        if (item.role === 'Emergency Request') return markerColors.Emergency;
        if (item.role === 'Community Member') return markerColors.Community;
        return markerColors.Volunteer;
    }

    function buildPopup(item) {
        return `
            <div style="min-width:180px;">
                <strong>${item.name}</strong><br>
                <span>${item.role}</span><br>
                <span>Status: ${item.status}</span><br>
                <span>Last updated: ${item.updated_at}</span><br>
                <span>Lat: ${item.latitude}, Lng: ${item.longitude}</span><br>
                <a href="#" style="display:inline-block;margin-top:.4rem;color:#2FA7FF;font-weight:600;">View Profile</a>
            </div>`;
    }

    function renderLocations(items) {
        const counts = { volunteers: 0, community: 0, emergency: 0, offline: 0 };

        items.forEach((item) => {
            if (item.status === 'Offline') counts.offline += 1;
            if (item.role === 'Volunteer') counts.volunteers += 1;
            if (item.role === 'Community Member') counts.community += 1;
            if (item.role === 'Emergency Request') counts.emergency += 1;

            const existing = markersById.get(item.id);
            const markerColor = getMarkerColor(item);

            if (existing) {
                existing.setLatLng([item.latitude, item.longitude]);
                existing.setPopupContent(buildPopup(item));
                existing.setStyle({ color: markerColor, fillColor: markerColor });
            } else {
                const marker = L.circleMarker([item.latitude, item.longitude], {
                    radius: 9,
                    color: markerColor,
                    fillColor: markerColor,
                    fillOpacity: 0.9,
                    weight: 2,
                }).addTo(map);

                marker.bindPopup(buildPopup(item));
                marker.on('click', () => marker.openPopup());
                markersById.set(item.id, marker);
            }
        });

        document.getElementById('volunteer-count').textContent = counts.volunteers;
        document.getElementById('community-count').textContent = counts.community;
        document.getElementById('emergency-count').textContent = counts.emergency;
        document.getElementById('offline-count').textContent = counts.offline;
    }

    function loadLocations() {
        fetch('/admin/locations', {
            headers: {
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
        })
            .then((response) => response.json())
            .then((data) => renderLocations(data))
            .catch((error) => console.error('Unable to load locations', error));
    }

    loadLocations();
    setInterval(loadLocations, 5000);
})();

const markersById = new Map();
const markerColors = {
    Volunteer: '#22c55e',
    Community: '#3b82f6',
    Emergency: '#ef4444',
    Offline: '#94a3b8',
};

function getMarkerColor(item) {
    if (item.status === 'Offline') return markerColors.Offline;
    if (item.role === 'Emergency Request') return markerColors.Emergency;
    if (item.role === 'Community Member') return markerColors.Community;
    return markerColors.Volunteer;
}

function buildPopup(item) {
    return `
        <div style="min-width:180px;">
            <strong>${item.name}</strong><br>
            <span>${item.role}</span><br>
            <span>Status: ${item.status}</span><br>
            <span>Last updated: ${item.updated_at}</span><br>
            <span>Lat: ${item.latitude}, Lng: ${item.longitude}</span><br>
            <a href="#" style="display:inline-block;margin-top:.4rem;color:#2FA7FF;font-weight:600;">View Profile</a>
        </div>`;
}

function renderLocations(items) {
    const counts = { volunteers: 0, community: 0, emergency: 0, offline: 0 };

    items.forEach((item) => {
        if (item.status === 'Offline') counts.offline += 1;
        if (item.role === 'Volunteer') counts.volunteers += 1;
        if (item.role === 'Community Member') counts.community += 1;
        if (item.role === 'Emergency Request') counts.emergency += 1;

        const existing = markersById.get(item.id);
        const markerColor = getMarkerColor(item);

        if (existing) {
            existing.setLatLng([item.latitude, item.longitude]);
            existing.setPopupContent(buildPopup(item));
            existing.setStyle({ color: markerColor, fillColor: markerColor });
        } else {
            const marker = L.circleMarker([item.latitude, item.longitude], {
                radius: 9,
                color: markerColor,
                fillColor: markerColor,
                fillOpacity: 0.9,
                weight: 2,
            }).addTo(map);

            marker.bindPopup(buildPopup(item));
            marker.on('click', () => marker.openPopup());
            markersById.set(item.id, marker);
        }
    });

    document.getElementById('volunteer-count').textContent = counts.volunteers;
    document.getElementById('community-count').textContent = counts.community;
    document.getElementById('emergency-count').textContent = counts.emergency;
    document.getElementById('offline-count').textContent = counts.offline;
}

function loadLocations() {
    fetch('/admin/locations', {
        headers: {
            Accept: 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
        },
    })
        .then((response) => response.json())
        .then((data) => renderLocations(data))
        .catch((error) => console.error('Unable to load locations', error));
}

loadLocations();
setInterval(loadLocations, 5000);
