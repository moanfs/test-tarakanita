<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $currentUserId = auth()->id();
        $users = User::with('role')
            ->whereHas('role', function ($query) {
                $query->whereIn('name_role', ['admin', 'petugas']);
            })
            ->where('id', '!=', $currentUserId)
            ->latest()
            ->paginate(10);

        return view('admin.table', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::where('name_role', '!=', 'superadmin')->get();
        return view('admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
        ]);
        return redirect()->route('admin.index')->with('success', 'Pengguna baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        //
        $roles = Role::where('name_role', '!=', 'superadmin')->get();
        // return view('admin.edit', compact('user', 'roles'));
        return view('admin.edit', [
            'user' => $admin,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin)
    {
        //
        $request->validate([
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        $admin->update([
            'role_id' => $request->role_id,
        ]);
        return redirect()->route('admin.index')->with('success', 'Peran pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        //
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'Data pelamar berhasil dihapus.');
    }
}
