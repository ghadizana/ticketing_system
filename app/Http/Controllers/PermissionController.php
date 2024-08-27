<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index(Request $request) {
        $permissions = Permission::query()
            ->when(!blank($request->serach), function ($query) use ($request) {
                return $query
                    ->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('guard_name', 'like', '%' . $request->search . '%');
            })
            ->with('roles', function ($query) {
                return $query->select('id', 'name');
            })
            ->orderBy('name')
            ->paginate(100);

        $roles = Role::orderBy('name')->get();

        return view('master.permission.index', compact('permissions', 'roles'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'guard_name' => ['nullable', 'string'],
            'deskripsi' => ['nullable', 'string'],
            'roles.*' => ['nullable', 'string'],
        ]);

        Permission::create($validator->validated())
        ?->assignRole(!blank($request->roles) ? $request->roles : array())
        ? back()->with('success', 'Permission has been created!')
        : back()->with('failed', 'Permission was not created successfully');

        return redirect()->back();
    }

    public function update(Request $request, Permission $permission) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'guard_name' => ['nullable', 'string'],
            'deskripsi' => ['nullable', 'string'],
            'roles.*' => ['nullable', 'string'],
        ]);

        $permission->update($validator->validated())
        && $permission->syncRoles(!blank($request->roles) ? $request->roles : array())
        ? back()->with('success', 'Permission has been updated successfully.')
        : back()->with('failed', 'Permission was not been deleted successfully.');

        return redirect()->back();
    }

    public function destroy(Permission $permission) {
        return $permission->delete()
            ? back()->with('success', 'Permission has been deleted successfully.')
            : back()->with('failed', 'Permission was not been deleted successfully.');
    }
}
