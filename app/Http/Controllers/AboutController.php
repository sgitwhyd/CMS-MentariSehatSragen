<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Abouts;

class AboutController extends Controller
{
    public function about()
    {
        $about = Abouts::get()->last();
        return view('admin.about.index', compact('about'));
    }

    public function aboutStore(Request $request)
    {
        $is_valid = $request->validate([
            'content' =>'required',
            'image' =>'required|file|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $fileName = "-";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // rename and store local file upload
            $fileName = time().'_'. Str::random(20). '.'. $file->getClientOriginalExtension();
            $file->move(public_path('images/about'), $fileName);
        }
        $about = new Abouts;
        $about->image = $fileName;
        $about->content = $request->content;
        $about->save();

    }

}
