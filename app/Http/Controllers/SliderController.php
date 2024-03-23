<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Sliders;

class SliderController extends Controller
{
    public function slider()
    {
        $slider = Sliders::orderBy('sort', 'ASC')->get();
        return view('admin.slider.index', compact('slider'));
    }

    public function sliderStore(Request $request)
    {
        $data = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' =>'required|file|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if($data->fails()) {
            foreach ($data->errors()->all() as $message) {
                toastr()->error($message);
            }
            return back()->withInput();
        }
        // store image
        $fileName = "-";
        if ($request->hasFile('image')) {
            $name = time() . '.' . $request->image->extension();
            $fileName = $request->file('image')->store('slider', 'public', $name);
        }
        // cek sort
        $is_sort = Sliders::where(['sort' => $request->sort])->first();
        if($is_sort) {
            toastr()->error('Urutan slider sudah digunakan!');
            return back()->withInput();
        }

        try {
            Sliders::create([
               'title' => $request->title,
               'description' => $request->description,
               'image' => $fileName,
               'sort' => $request->sort
            ]);

            toastr()->success('Berhasil menambahkan Slider baru!');

        } catch (Throwable $th) {
            toastr()->error('Gagal menambahkan Slider!');
        }

        return redirect()->route('slider');
    }

    public function destroy(Request $request) {

        $slider = Sliders::find($request->id);
        // remove image local
        Storage::delete('public/' . $slider->image);
        // remove from database
        $slider->delete();
        toastr()->success('Berhasil menghapus Slider!');
        return response()->json(['success' => true]);
    }

    public function edit(Request $request){
        $slider = Sliders::find($request->d);
        if($slider) {
            return view('admin.slider.edit', compact('slider'));
        }

    }

    public function update(Request $request) {
        dd($request->all());

        // cek request 
        $data = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' =>'required|file|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if($data->fails()) {
            foreach ($data->errors()->all() as $message) {
                toastr()->error($message);
            }
            return back()->withInput();
        }
        // store image
        $fileName = "-";
        if ($request->hasFile('image')) {
            $name = time() . '.' . $request->image->extension();
            $fileName = $request->file('image')->store('slider', 'public', $name);
        }
        // cek sort
        $is_sort = Sliders::where(['sort' => $request->sort])->first();
        if($is_sort) {
            toastr()->error('Urutan slider sudah digunakan!');
            return back()->withInput();
        }

        try {
            Sliders::create([
               'title' => $request->title,
               'description' => $request->description,
               'image' => $fileName,
               'sort' => $request->sort
            ]);

            toastr()->success('Berhasil menambahkan Slider baru!');

        } catch (Throwable $th) {
            toastr()->error('Gagal menambahkan Slider!');
        }

        return redirect()->route('slider');
    }
    
}
