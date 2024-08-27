<?php

namespace App\Http\Controllers;

use App\Models\GrupUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function actionRegister(Request $request)
    {
        // $user = User::create([
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        //     'nama' => $request->nama,
        //     'email' => $request->email,
        //     'idProyek' => $request->idProyek,
        //     'idKaryawan' => $request->idKaryawan,
        //     'idGrupUser' => $request->idGrupUser,
        //     'idDepartment' => $request->idDepartment,
        //     'image' => $request->image,
        // ]);

        // return redirect()->route('masterUser')->with('success', 'Data berhasil ditambahkan');

        // $users = User::query()
        //     ->when(!blank($request->search), function ($query) use ($request) {
        //         return $query
        //             ->where('nama', 'like', '%' . $request->search . '%')
        //             ->orWhere('email', 'like', '%' . $request->search . '%');
        //     })
        //     ->with('roles', function ($query) {
        //         return $query->select('nama');
        //     })
        //     ->latest()
        //     ->paginate(10);
    }
}
