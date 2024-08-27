<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMasterUserRequest;
use App\Http\Requests\UpdateMasterUserRequest;
use App\Models\Proyek;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class MasterUserController extends Controller
{
    public function index(Request $request)
    {
        $masterUsers = User::query()
            ->when(!blank($request->search), function ($query) use ($request) {
                return $query
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orwhere('email', 'LIKE', '%' . $request->search . '%');
            })
            ->with('roles', function ($query) {
                return $query->select('name');
            })
            ->latest()
            ->paginate(10);

        $roles = Role::orderBy('name')->get();
        $proyeks = Proyek::all();

        return view('master.masterUser.index', compact('masterUsers', 'roles', 'proyeks'));
    }

    public function show($userId)
    {
        $users = User::where('userId', $userId)->firstOrFail();
        $proyeks = Proyek::all();
        $roles = Role::orderBy('name')->get();

        return view('master.masterUser.detail', compact('users', 'proyeks', 'roles'));
    }

    public function store(StoreMasterUserRequest $request, User $user)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage/uploads'), $imageName);

        $user = User::create(array_merge(
            $request->validated(),
            array(
                'password' => Hash::make('password'),
                'image' => $imageName,
            )
        ))?->assignRole(!blank($request->role) ? $request->role : array());

        return $user
            ? back()->with('success', 'User berhasil dibuat')
            : back()->with('failed', 'User gagal dibuat');
    }

    public function update(UpdateMasterUserRequest $request, User $users, UserService $userService)
    {
        return $userService->update($request, $users)
        ? back()->with('success', 'User berhasil diperbaharui')
        : back()->with('failed', 'User gagal diperbaharui');
    }


    public function destroy($userId)
    {
        $users = User::where('userId', $userId);

        if ($users) {
            $users->delete();
            return redirect()->route('masterUser.index')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('masterUser.index')->with('error', 'User not found');
        }
    }
}
