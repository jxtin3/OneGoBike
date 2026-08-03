<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Show the admin dashboard with the real-time map.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Return all active locations as JSON for the map widget.
     */
    public function index(): JsonResponse
    {
        $locations = Location::query()
            ->select(['id', 'name', 'role', 'status', 'latitude', 'longitude', 'updated_at'])
            ->orderByDesc('updated_at')
            ->get()
            ->map(function (Location $location) {
                return [
                    'id' => $location->id,
                    'name' => $location->name ?? 'Unnamed',
                    'role' => $location->role ?? 'Volunteer',
                    'status' => $location->status ?? 'Active',
                    'latitude' => (float) $location->latitude,
                    'longitude' => (float) $location->longitude,
                    'updated_at' => $location->updated_at?->format('Y-m-d H:i:s'),
                ];
            });

        return response()->json($locations);
    }

    /**
     * Store a location payload from the admin or seed routine.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'status' => ['nullable', 'string', 'max:255'],
        ]);

        $location = Location::create([
            'user_id' => auth()->id(),
            'name' => $data['name'] ?? 'System Update',
            'role' => $data['role'] ?? 'Volunteer',
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'status' => $data['status'] ?? 'Active',
        ]);

        return response()->json($location->fresh(), 201);
    }
}
