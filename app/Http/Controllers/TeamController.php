<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Teams;

class TeamController extends Controller
{
    public function teams()
    {
        $teams = Teams::all();
        return view('admin.pengurus.index', compact('teams'));
    }

    public function teamStore(Request $request)
    {
        $is_valid = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'image' => 'required|file|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        $fileName = "-";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // rename and store local file upload
            $fileName = time().'_'. Str::random(20). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/teams'), $fileName);
        }
        Teams::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'image' => $fileName,
        ]);
        return redirect()->route('pengurus')->with('success', 'Pengurus berhasil ditambahkan');

    }

    public function teamDestroy(Request $request) {
        $team = Teams::find($request->id);
        $team->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pengurus berhasil dihapus!',
        ]); 

    }

}
