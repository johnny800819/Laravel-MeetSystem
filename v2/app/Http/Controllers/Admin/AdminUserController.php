<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin_users = \App\Models\AdminUser::with('roles')->get();
        return view('admin.admin_users.index', compact('admin_users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = \Spatie\Permission\Models\Role::all();
        return view('admin.admin_users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin_users,email',
            'password' => 'required|string|min:6|confirmed',
            'roles' => 'required|array',
            'is_super' => 'boolean',
        ]);

        $admin = \App\Models\AdminUser::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
            'is_super' => $request->has('is_super'),
        ]);

        $admin->syncRoles($validated['roles']);

        return redirect()->route('admin.admin_users.index')
            ->with('success', 'Admin user created successfully.');
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
    public function edit(string $id)
    {
        $admin_user = \App\Models\AdminUser::findOrFail($id);
        $roles = \Spatie\Permission\Models\Role::all();
        return view('admin.admin_users.edit', compact('admin_user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = \App\Models\AdminUser::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin_users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'roles' => 'required|array',
            'is_super' => 'boolean',
        ]);

        $admin->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'is_super' => $request->has('is_super'),
        ]);

        if (!empty($validated['password'])) {
            $admin->update([
                'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
            ]);
        }

        $admin->syncRoles($validated['roles']);

        return redirect()->route('admin.admin_users.index')
            ->with('success', 'Admin user updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = \App\Models\AdminUser::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.admin_users.index')
            ->with('success', 'Admin user deleted successfully.');
    }
}
