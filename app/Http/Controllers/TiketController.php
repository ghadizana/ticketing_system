<?php

namespace App\Http\Controllers;

use App\Models\Lampiran;
use App\Models\Mandays;
use App\Models\Menu;
use App\Models\Proyek;
use App\Models\TemporaryImage;
use App\Models\Tiket;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TiketController extends Controller
{
    public function index(Request $request)
    {
        $tikets = Tiket::query()
            ->when(!blank($request->search), function ($query) use ($request) {
                return $query
                    ->where('judul', 'like', '%' . $request->search . '%');
            })
            ->orderBy('idTiket')
            ->paginate(50);
        $proyeks = Proyek::all();

        return view('issue.tiket.index', compact('tikets', 'proyeks'));
    }

    public function create()
    {
        $proyeks = Proyek::all();
        $users = User::all();

        return view('issue.tiket.create', compact('proyeks', 'users'));
    }

    public function user_create()
    {
        $proyeks = Proyek::all();
        $users = User::all();

        return view('issue.tiket.user.create', compact('proyeks', 'users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idProyek' => 'nullable',
            'judul' => 'nullable',
            'deskripsi' => 'nullable',
            'kategori' => 'nullable',
            'prioritas' => 'nullable',
            'severity' => 'nullable',
            'picRs' => 'nullable',
            'alasanPermintaan' => 'nullable',
            'dampak' => 'nullable',
            'mandays' => 'nullable',
            'label' => 'nullable',
            'assignTo' => 'nullable',
            'plAviat' => 'nullable',
            'persetujuan' => 'nullable',
            'tglPersetujuan' => 'nullable',
            'tag' => 'nullable',
            'tglDikerjakan' => 'nullable',
            'dueDate' => 'nullable',
            'tglSelesai' => 'nullable',
            'status' => 'nullable',
        ]);
        // $manday = Mandays::where('idProyek', $tiket->idProyek)->first();

        $temporaryFiles = TemporaryImage::all();

        if ($validator->fails()) {
            foreach ($temporaryFiles as $temporaryFile) {
                Storage::deleteDirectory('images/tmp/' . $temporaryFile->folder);
                $temporaryFile->delete();
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tiket = Tiket::create($validator->validated());

        foreach ($temporaryFiles as $temporaryFile) {
            Storage::copy('images/tmp/' . $temporaryFile->folder . '/' . $temporaryFile->file, 'lampirans/' . $temporaryFile->folder . '/' . $temporaryFile->file);
            Lampiran::create([
                'idTiket' => $tiket->idTiket,
                'name' => $temporaryFile->file,
                'path' => $temporaryFile->folder . '/' . $temporaryFile->file
            ]);
            Storage::deleteDirectory('images/tmp/' . $temporaryFile->folder);
            $temporaryFile->delete();
        }

        return redirect()->route('tiket.index')->with('success', 'Tiket berhasil dibuat');
    }

    public function show($idTiket)
    {
        $tikets = Tiket::findOrFail($idTiket);
        $proyeks = Proyek::all();
        $users = User::all();
        $mandays = Mandays::all();

        return view('issue.tiket.edit', compact('tikets', 'proyeks', 'users', 'mandays'));
    }

    public function update($idTiket, Request $request)
    {
        $request->merge([
            'tglDikerjakan' => \Carbon\Carbon::parse($request->input('tglDikerjakan'))->format('Y-m-d'),
            'dueDate' => \Carbon\Carbon::parse($request->input('dueDate'))->format('Y-m-d'),
            'tglSelesai' => \Carbon\Carbon::parse($request->input('tglSelesai'))->format('Y-m-d'),
        ]);

        $tikets = Tiket::where('idTiket', $idTiket)->update($request->only([
            'idProyek' => 'nullable',
            'judul' => 'nullable',
            'deskripsi' => 'nullable',
            'kategori' => 'nullable',
            'prioritas' => 'nullable',
            'severity' => 'nullable',
            'picRs' => 'nullable',
            'alasanPermintaan' => 'nullable',
            'dampak' => 'nullable',
            'mandays' => 'nullable',
            'label' => 'nullable',
            'assignTo' => 'nullable',
            'plAviat' => 'nullable',
            'persetujuan' => 'nullable',
            'tglPersetujuan' => 'nullable',
            'tag' => 'nullable',
            'mandays' => 'nullable',
            'tglDikerjakan' => 'nullable',
            'dueDate' => 'nullable',
            'tglSelesai' => 'nullable',
            'status' => 'nullable',
            'lampiran' => 'nullable',
        ]));

        return redirect()->route('tiket.index');
    }

    public function destroy($idTiket)
    {
        $tiket = Tiket::find($idTiket);
        if ($tiket) {
            $tiket->lampirans()->delete();
            $tiket->delete();
        }

        return redirect()->back();
    }

}
