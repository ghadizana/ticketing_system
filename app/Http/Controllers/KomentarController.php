<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Komentar;
use Illuminate\Http\Request;
use App\Models\TemporaryImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KomentarController extends Controller
{
    public function show($idTiket)
    {
        $komentars = Komentar::with('images')->get();
        $users = User::all();

        return view('issue.komentar.index', compact('komentars', 'users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idTiket' => 'required',
            'userId' => 'required',
            'komentar' => 'required',
        ]);

        $temporaryFiles = TemporaryImage::all();

        if ($validator->fails()) {
            foreach ($temporaryFiles as $temporaryFile) {
                Storage::deleteDirectory('images/tmp/' . $temporaryFile->folder);
                $temporaryFile->delete();
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $komentar = Komentar::create($validator->validated());

        foreach ($temporaryFiles as $temporaryFile) {
            Storage::copy('images/tmp/' . $temporaryFile->folder . '/' . $temporaryFile->file, 'images/' . $temporaryFile->folder . '/' . $temporaryFile->file);
            Image::create([
                'idKomentar' => $komentar->idKomentar,
                'name' => $temporaryFile->file,
                'path' => $temporaryFile->folder . '/' . $temporaryFile->file
            ]);
            Storage::deleteDirectory('images/tmp/' . $temporaryFile->folder);
            $temporaryFile->delete();
        }

        return redirect()->back();
    }

    public function destroy($idKomentar)
    {
        $komentar = Komentar::find($idKomentar);
        if ($komentar) {
            // Delete associated images
            $komentar->images()->delete();

            // Delete the komentar
            $komentar->delete();
        }

        return redirect()->back();
    }
}
