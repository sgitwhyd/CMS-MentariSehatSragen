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
        $visiMisi = VisiMisies::get()->last();
        $is_valid = $request->validate([
            'visi' =>'required',
            'misi' =>'required',
        ]);
        if($visiMisi) {
            VisiMisies::where('id', $visiMisi->id)->update([
                'content_visi' => $request->visi,
                'content_misi' => $request->misi,
            ]);
            toastr()->success('Berhasil mengubah Visi Misi');
        } else {
            VisiMisies::create([
                'content_visi' => $request->visi,
                'content_misi' => $request->misi,
            ]);
            toastr()->success('Berhasil menambahkan Visi Misi');
        }
        
        return response()->json(['success' => true]);
    }
}
