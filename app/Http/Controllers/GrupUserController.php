<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrupUserRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class GrupUserController extends Controller
{
    public function index(Request $request)
    {
        $grupUsers = Role::query()
            ->when(!blank($request->search), function ($query) use ($request) {
                return $query
                    ->where('name', 'like', '%' . $request->search . '%')
                    ->onWhere('guard_name', 'like', '%' . $request->search . '%');
            })
            ->with('permissions', function ($query) {
                return $query->select('id', 'name');
            })
            ->orderBy('name')
            ->paginate(10);

        $permissions = Permission::orderBy('name')->get();

        return view('master.grupUser.index', compact('grupUsers', 'permissions'));
    }

    public function store(StoreGrupUserRequest $request)
    {
        return Role::create($request->validated())
            ?->givePermissionTo(!blank($request->permissions) ? $request->permissions : array())
            ? back()->with('success', 'Grup user has been created successfully.')
            : back()->with('failed', 'Grup user was not created successfully.');
    }

    public function update(StoreGrupUserRequest $request, $id)
    {
        try {
            $role = Role::find($id);
            $role->update([
                'name' => $request->name,
                'deskripsi' => $request->deskripsi,
            ]);

            return Role::find($id)
                ?->syncPermissions(!blank($request->permissions) ? $request->permissions : array())
                ? back()->with('success', 'Grup user has been updated successfully')
                : back()->with('failed', 'Grup user was not updated successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Role $grupUser)
    {
        return $grupUser->delete()
            ? back()->with('success', 'Grup user has been deleted successfully')
            : back()->with('failed', 'Grup user was not been deleted successfully');
    }
}
