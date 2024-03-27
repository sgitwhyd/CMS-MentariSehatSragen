<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Abouts;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function about()
    {
        $about = Abouts::get()->last();
        return view('admin.about.index', compact('about'));
    }

    public function aboutStore(Request $request)
    {
        $is_valid = Validator::make($request->all(), [
                 'content' => 'required',
                 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             ]);

        if($is_valid->fails()) {
            if($request->content === '<p><br></p>') {
                toastr()->error('Content tidak boleh kosong!');
            }

            foreach ($is_valid->errors()->all() as $message) {
                toastr()->error($message);
            }
            return back()->withInput();
        }

        if($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $image = $request->file('image')->store('abouts', 'public', $imageName);
        } else {
            $image = null;
        }

        $old_about = Abouts::get()->last();
        if($old_about) {
            Abouts::where('id', $old_about->id)->update([
                'content' => $request->content ? $request->content : $old_about->content,
                'image' => $image ? $image : $old_about->image,
            ]);
            toastr()->success('Data Berhasil Diubah');
            return redirect()->back();
        } else {
            Abouts::create([
                'content' => $request->content,
                'image' => $image,
            ]);
            toastr()->success('Data Berhasil Ditambahkan');
            return redirect()->back();
        }


       

    }

}
