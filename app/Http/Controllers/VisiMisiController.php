<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisiMisies;

class VisiMisiController extends Controller
{
    public function visiMisi()
    {
        $visiMisi = VisiMisies::get()->last();
        return view('admin.visi-misi.index', compact('visiMisi'));
    }

    public function visiMisiStore(Request $request)
    {
        $is_valid = $request->validate([
            'visi' =>'required',
            'misi' =>'required',
        ]);
        
        VisiMisies::create([
            'content_visi' => $request->visi,
            'content_misi' => $request->misi,
        ]);
        redirect()->back()->with('success', 'Visi Misi berhasil ditambahkan');
        return response()->json(['success']);
    }
}
