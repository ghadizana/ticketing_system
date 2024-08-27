<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function create(Request $request): User
    {
        return User::create(array_merge(
            $request->validated(),
        ))?->assignRole(!blank($request->role) ? $request->role : array());
    }

    public function update(Request $request, User $user): User|bool
    {
        $user->syncRoles($request->role);

        $email = $request->email === $user->email
            ? $request->email
            : (blank(User::firstWhere('email', $request->email)) ? $request->email : null);

        return blank($email) ? false : $user->update(array_merge(
            $request->validated(),
            array(
                'idKaryawan' => $request->idKaryawan,
            )
        ));
    }
}
