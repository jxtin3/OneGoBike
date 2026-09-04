<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    private array $roles = ['Admin', 'GoBiker', 'User'];
    private array $statuses = ['Active', 'Inactive'];

    public function index(Request $request)
    {
        $users = User::query()->when($request->search, fn ($q, $v) => $q->where(fn ($q) => $q->where('name', 'like', "%{$v}%")->orWhere('email', 'like', "%{$v}%")))->when($request->role && in_array($request->role, $this->roles), fn ($q) => $q->where('role', $request->role))->when($request->status && in_array($request->status, $this->statuses), fn ($q) => $q->where('status', $request->status))->latest()->paginate(10)->withQueryString();
        return view('admin.operations.users.index', ['users' => $users, 'roles' => $this->roles, 'statuses' => $this->statuses]);
    }

    public function create() { return view('admin.operations.users.create', ['roles' => $this->roles, 'statuses' => $this->statuses]); }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:255'], 'email' => ['required', 'email', 'unique:users,email'], 'password' => ['required', 'confirmed', 'min:8'], 'role' => ['required', Rule::in($this->roles)], 'status' => ['required', Rule::in($this->statuses)]]);
        $data['password'] = Hash::make($data['password']);
        $data['is_admin'] = $data['role'] === 'Admin';
        User::create($data);
        return redirect()->route('admin.operations.users.index')->with('success', 'User successfully created.');
    }

    public function show(User $user) { return view('admin.operations.users.show', compact('user')); }
    public function edit(User $user) { return view('admin.operations.users.edit', ['user' => $user, 'roles' => $this->roles, 'statuses' => $this->statuses]); }

    public function update(Request $request, User $user)
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:255'], 'email' => ['required', 'email', Rule::unique('users')->ignore($user)], 'password' => ['nullable', 'confirmed', 'min:8'], 'role' => ['required', Rule::in($this->roles)], 'status' => ['required', Rule::in($this->statuses)]]);
        if (blank($data['password'] ?? null)) unset($data['password']); else $data['password'] = Hash::make($data['password']);
        $data['is_admin'] = $data['role'] === 'Admin';
        $user->update($data);
        return redirect()->route('admin.operations.users.index')->with('success', 'User successfully updated.');
    }

    public function destroy(User $user)
    {
        if ($user->is(auth()->user())) return back()->with('error', 'You cannot delete your own account.');
        $user->delete();
        return back()->with('success', 'User successfully deleted.');
    }
}
