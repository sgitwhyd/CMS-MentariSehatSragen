<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Footers;
use App\Models\Teams;
use App\Models\VisiMisies;
use App\Models\Sliders;
use App\Models\Abouts;

class AdminController extends Controller
{
    public function index()
    {
        // auth check
        //
        return view('admin.dashboard');
    }


    public function slider()
    {
        return view('admin.slider');
    }

    public function sliderStore(Request $request)
    {
        $is_valid = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' =>'required|file|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $fileName = "-";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // rename and store local file upload
            $fileName = time().'_'.Str::random(10). '.'. $file->getClientOriginalExtension();
            $file->move(public_path('images/slider'), $fileName);
        }

        $slider = new Sliders;
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $fileName;
        $slider->save();

        return redirect()->route('slider')->with('success', 'Slider berhasil ditambahkan');
    }

    public function blog()
    {
        return view('admin.blog');
    }

    public function contact()
    {
        return view('admin.contact');
    }

    public function detailBlog($id)
    {
        return view('admin.blog-detail');
    }

    

}
