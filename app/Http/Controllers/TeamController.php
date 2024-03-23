<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Teams;

class TeamController extends Controller
{
    public function teams()
    {
        $teams = Teams::orderBy('sort', 'ASC')->get();
        return view('admin.pengurus.index', compact('teams'));
    }

    public function teamStore(Request $request)
    {
        $data = Validator::make($request->all(), [
            'nama' => 'required',
            'jabatan' => 'required',
            'image' => 'required|file|image|mimes:jpg,png,jpeg|max:2048',
            'sort' => 'required',
        ]);

        if($data->fails()) {
            foreach ($data->errors()->all() as $message) {
                toastr()->error($message);
            }
            return back()->withInput();
        }

        // cek sort
        $is_sort = Teams::where(['sort' => $request->sort])->first();
        if($is_sort) {
            toastr()->error('Urutan pengurus sudah digunakan!');
            return back()->withInput();
        }

        // store image
        $fileName = "-";
        if ($request->hasFile('image')) {
            $name = time() . '.' . $request->image->extension();
            $fileName = $request->file('image')->store('teams', 'public', $name);
        }
        Teams::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'image' => $fileName,
            'sort' => $request->sort,
        ]);

        toastr()->success('Pengurus berhasil ditambahkan');
        return redirect()->route('pengurus');

    }

    public function teamDestroy(Request $request) 
    {
        $team = Teams::find($request->id);
        // remove image local
        Storage::delete('public/' . $team->image);
        // remove from database
        $team->delete();
        toastr()->success('Berhasil menghapus Pengurus!');
        return response()->json(['success' => true]);
    }

    public function edit(Request $request) {
        $pengurus = Teams::find($request->d);
        if($pengurus) {
            return view('admin.pengurus.edit', compact('pengurus'));
        }
    }

    public function update(Request $request) {
        $old_team = Teams::find($request->id);
        $post = [
            'nama' => 'required',
            'jabatan' => 'required',
            'sort' => 'required',
        ];

        // cek image request 
        if($request->hasFile('image')) {
            $post['image'] = 'file|image|mimes:jpg,png,jpeg|max:2048';
        }
        $data = Validator::make($request->all(), $post);

        if($data->fails()) {
            foreach ($data->errors()->all() as $message) {
                toastr()->error($message);
            }
            return back()->withInput();
        }

        // store image
        $fileName = $old_team->image;
        if ($request->hasFile('image')) {
            $name = time() . '.' . $request->image->extension();
            $fileName = $request->file('image')->store('teams', 'public', $name);
            Storage::delete('public/'. $old_team->image);
        }
        
        // cek sort
        $is_sort = Teams::where(['sort' => $request->sort])->first();
        if($is_sort) {
            Teams::where(['id' => $is_sort->id])->update(['sort' => $old_team->sort]);
        }

        try {
            Teams::where(['id' => $request->id])->update([
               'nama' => $request->nama,
               'jabatan' => $request->jabatan,
               'image' => $fileName,
               'sort' => $request->sort
            ]);

            toastr()->success('Berhasil mengubah Pengurus!');

        } catch (Throwable $th) {
            toastr()->error('Gagal mengubah Pengurus!');
        }

        return redirect()->route('pengurus');

    }
}
