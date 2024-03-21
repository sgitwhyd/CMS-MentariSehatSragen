<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Footers;

class FooterController extends Controller
{
    public function footer()
    {
        $footer = Footers::get()->last();
        return view('admin.footer.index', compact('footer'));
    }

    public function footerStore(Request $request)
    {
        $is_valid = $request->validate([
                'title' => 'required',
                'alamat' => 'required',
                'email' => 'required',
                'no_telp' => 'required',
                'image' => 'required|file|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        $fileName = "-";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // rename and store local file upload
            $fileName = time().'_'. Str::random(20). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/footer'), $fileName);
        }

        if($is_valid) {
            $footer = new Footers;
            $footer->title = $request->title;
            $footer->email = $request->email;
            $footer->alamat = $request->alamat;
            $footer->no_telp = $request->no_telp;
            $footer->facebook = $request->facebook;
            $footer->instagram = $request->instagram;
            $footer->twitter = $request->twitter;
            $footer->tiktok = $request->tiktok;
            $footer->youtube = $request->youtube;
            $footer->image = $fileName;
            $footer->save();

            return redirect()->route('footer')->with('success', 'Footer berhasil ditambahkan');

        }
    }
}
