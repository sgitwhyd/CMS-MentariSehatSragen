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
        $old_footer = Footers::get()->last();
        if($old_footer) {
            // jika gambar ganti
            $fileName = $old_footer->image;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                // rename and store local file upload
                $fileName = time().'_'. Str::random(20). '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/footer'), $fileName);
                unlink(public_path('images/footer/').$old_footer->image);
            }
            // update
            Footers::where('id', $old_footer->id)->update([
                'title' => $request->title ? $request->title : $old_footer->title,
                'email' => $request->email ? $request->email : $old_footer->email,
                'alamat' => $request->alamat ? $request->alamat : $old_footer->alamat,
                'no_telp' => $request->no_telp ? $request->no_telp : $old_footer->no_telp,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
                'tiktok' => $request->tiktok,
                'image' => $fileName,
            ]);
            return redirect()->route('footer')->with('success', 'Footer berhasil diubah');
        } else {
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
}
