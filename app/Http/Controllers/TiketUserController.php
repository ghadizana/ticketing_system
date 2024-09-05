<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Proyek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mandays;
use App\Models\Tiket;
use Illuminate\Support\Facades\Auth;

class TiketUserController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::all();
        $users = User::where('idProyek', Auth::user()->idProyek)->get();

        return view('issue.tiket.user.create', compact('proyeks', 'users'));
    }

    public function update(Request $request, $id) {
        $tiket = Tiket::findOrFail($id);
    
        if (auth()->user()->statusUser === 0) {
            $tiket->statusMandays = $request->input('statusMandays');
    
            // Update status based on statusMandays value
            if ($tiket->statusMandays == 0) {
                $tiket->status = 'Reject';
            } elseif($tiket->statusMandays == 1) {
                $tiket->status = 'On Progress';

                $mandays = Mandays::where('idProyek', $tiket->idProyek)->where('tahun', now()->format('Y-m-d'))->first();

                if ($mandays) {
                    $mandays->terpakai += $tiket->mandays;
                    $mandays->save();
                }
            }
            
            $tiket->save();
        }
    
        return redirect()->route('tiket.index');
    }   
}
