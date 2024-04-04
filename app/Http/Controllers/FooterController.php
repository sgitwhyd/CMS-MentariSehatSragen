<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Footers;
use Illuminate\Support\Facades\Storage;

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
        $image = null;
        if($old_footer) {

            if ($request->hasFile('image')) {
              
                if($old_footer->image) {
                    Storage::disk('public')->delete($old_footer->image);
                }

                $imageName = time() . '.' . $request->image->extension();
                $image = $request->file('image')->store('footer', 'public', $imageName);


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
                'image' => $request->image ? $image : $old_footer->image,
            ]);
            toastr()->success('Footer berhasil diupdate');
            return redirect()->route('footer');
        } else {
            $is_valid = $request->validate([
                'title' => 'required',
                'alamat' => 'required',
                'email' => 'required',
                'no_telp' => 'required',
                'image' => 'file|image|mimes:jpg,png,jpeg|max:2048',
            ]);
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $image = $request->file('image')->store('blogs', 'public', $imageName);

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
                    $footer->image = $image;
                    $footer->save();
                
                    toastr()->success('Footer berhasil ditambahkan');
                    return redirect()->route('footer');
                }
            }
            
           
        }
    }
}
