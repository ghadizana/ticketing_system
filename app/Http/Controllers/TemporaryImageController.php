<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryImage;
use Illuminate\Support\Facades\Storage;

class TemporaryImageController extends Controller
{
    public function store(Request $request) {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $folder = uniqid('image-', true);
            $image->storeAs('images/tmp/'. $folder, $fileName);

            TemporaryImage::create([
                'folder' => $folder,
                'file' => $fileName,
            ]);

            return $folder;
        }
        return '';
    }

    public function destroy() {
        $temporaryFile = TemporaryImage::where('folder', request()->getContent())->first();
        if ($temporaryFile) {
            Storage::deleteDirectory('images/tmp/'. $temporaryFile->folder);
            $temporaryFile->delete();
        }

        return response()->noContent();
    }
}
