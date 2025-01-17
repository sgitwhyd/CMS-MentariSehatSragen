<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('admin.berita-dan-kegiatan.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita-dan-kegiatan.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
             'title' => 'required',
             'description' => 'required|max:255',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
             'content' => 'required'
         ]);

        

        if($data->fails()) {
            if($request->content === '<p><br></p>') {
                toastr()->error('Content tidak boleh kosong!');
            }

            foreach ($data->errors()->all() as $message) {
                toastr()->error($message);
            }
            return back()->withInput();
        }

        $imageName = time() . '.' . $request->image->extension();
        $image = $request->file('image')->store('blogs', 'public', $imageName);

        try {
            Blog::create([
               'title' => $request->title,
               'slug' => Str::slug($request->title),
               'description' => $request->description,
               'image' => $image,
               'content' => $request->content,
       ]);

            toastr()->success('Berhasil menambahkan berita atau kegiatan baru!');

        } catch (\Throwable $th) {
            toastr()->error('Gagal menambahkan berita atau kegiatan baru!');
        }

        return redirect()->route('berita-dan-kegiatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.berita-dan-kegiatan.edit', compact('blog'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = Validator::make($request->all(), [
             'title' => 'required',
             'description' => 'required|max:255',
             'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'content' => 'required'
         ]);

        if($data->fails()) {
            if($request->content === '<p><br></p>') {
                toastr()->error('Content tidak boleh kosong!');
            }
            
            foreach ($data->errors()->all() as $message) {
                toastr()->error($message);
            }
            return back()->withInput();
        }

        $blog = Blog::find($id);


        if($request->hasFile('image')) {
            Storage::delete('public/' . $blog->image);

            $imageName = time() . '.' . $request->image->extension();
            $image = $request->file('image')->store('blogs', 'public', $imageName);

        } else {
            $image = $blog->image;
        }

        try {
            $blog->where('id', $blog->id)->update([
               'title' => $request->title,
               'slug' => Str::slug($request->title),
               'description' => $request->description,
               'image' => $image,
               'content' => $request->content,
         ]);

            toastr()->success('Berhasil mengubah berita atau kegiatan!');
            return redirect()->route('berita-dan-kegiatan');
        } catch (\Throwable $th) {
            toastr()->error('Gagal mengubah berita atau kegiatan!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        try {
            Storage::delete('public/' . $blog->image);
            $blog->delete();
            toastr()->success('Berhasil menghapus berita atau kegiatan!');
            return redirect()->back();
        } catch (\Throwable $th) {
            toastr()->error('Gagal menghapus berita atau kegiatan!');
            return redirect()->back();
        }
    }
}
