<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class MobileAuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255', 'unique:users,email'],
            'mobile'    => ['required', 'string', 'max:30'],
            'barangay'  => ['required', 'string', 'max:255'],
            'role'      => ['required', 'in:Resident,GoBiker'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $isGoBiker = $data['role'] === 'GoBiker';

        User::create([
            'name'     => $data['full_name'],
            'email'    => strtolower($data['email']),
            'mobile'   => $data['mobile'],
            'barangay' => $data['barangay'],
            'password' => $data['password'], // hashed by the model cast
            'role'     => $isGoBiker ? 'GoBiker' : 'User',
            // GoBikers appear on the live map, so an admin must approve them first
            'status'   => $isGoBiker ? 'Inactive' : 'Active',
            'is_admin' => false,
        ]);

        return response()->json([
            'message' => $isGoBiker
                ? 'Account created. Please wait for admin approval before logging in.'
                : 'Account created successfully!',
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', strtolower($credentials['email']))->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are invalid.'],
            ]);
        }

        if (($user->status ?? 'Active') !== 'Active') {
            throw ValidationException::withMessages([
                'email' => ['Your account is not active yet. Please wait for admin approval.'],
            ]);
        }

        $token = $user->createToken('go-biker-mobile')->plainTextToken;

        return response()->json([
            'message' => 'Login successful.',
            'token'   => $token,
            'user'    => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
                'role'  => $user->role,
            ],
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()?->delete();

        return response()->json(['message' => 'Logout successful.']);
    }
}