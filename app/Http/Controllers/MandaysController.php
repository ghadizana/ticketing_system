<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMandaysProyekRequest;
use App\Models\Mandays;
use App\Models\Proyek;
use Illuminate\Http\Request;

class MandaysController extends Controller
{
    public function index()
    {
        $mandays = Mandays::with('proyek')->get();
        $proyeks = Proyek::all();
        
        return view('issue.mandays.index', compact('mandays', 'proyeks'));
    }

    public function store(StoreMandaysProyekRequest $request)
    {
        $mandaysService = Mandays::create($request->validated());

        return $mandaysService
            ? back()->with('success', 'Mandays berhasil ditambahkan')
            : back()->with('failed', 'Mandays gagal ditambahkn');
    }

    public function update(Request $request, $idMandays)
    {
        $mandays = Mandays::findOrFail($idMandays);
        $mandays->update($request->all());

        return redirect()->route('mandays.index');
    }

    public function destroy($idMandays)
    {
        $mandays = Mandays::find($idMandays);
        if (!$mandays) {
            return back()->with('failed', 'Mandays tidak ditemukan');
        }
        return $mandays->delete()
            ? back()->with('success', 'Mandays berhasil dihapus')
            : back()->with('failed', 'Mandays gagal dihapus');
    }
}
