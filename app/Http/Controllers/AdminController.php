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

    public function about()
    {
        $about = Abouts::get()->last();
        return view('admin.about', compact('about'));
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

    public function teams()
    {
        return view('admin.pengurus');
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
            $file->move(public_path('uploads'), $fileName);
        }
        Teams::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'image' => $fileName,
        ]);
        return redirect()->route('pengurus')->with('success', 'Pengurus berhasil ditambahkan');

    }

    public function visiMisi()
    {
        return view('admin.visi-misi');
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

    public function footer()
    {
        return view('admin.footer');
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
