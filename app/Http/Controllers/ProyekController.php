<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProyekController extends Controller
{
    public function index(Request $request)
    {
        $proyek = Proyek::all();
        return view('issue.proyek.index', compact('proyek'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namaProyek' => 'required|string',
            'tipeRs' => 'required|string',
            'group' => 'required|boolean',
            'namaGroup' => 'nullable|string',
            'tglMulai' => 'required|date',
            'tglAkhir' => 'required|date',
            'konsepKerjasama' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $validatedData = $validator->validated();
        
        $proyek = Proyek::create(array_merge(
            $validatedData,
        ));

        return redirect()->route('proyek.index')->with('success', 'Route created successfully');
    }

    public function update(Request $request, $idProyek)
    {
        $proyek = Proyek::findOrFail($idProyek);
        $proyek->update($request->all());

        return redirect()->route('proyek.index');
    }

    public function destroy(Proyek $proyek)
    {
        return $proyek->delete()
            ? back()->with('success', 'Proyek berhasil dihapus')
            : back()->with('failed', 'Proyek gagal dihapus');
    }
}
