<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Sliders;
use Throwable;

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
            'image' =>'required|file|image|mimes:jpg,png,jpeg|max:1024',
            'sort' => 'required|numeric',
        ]);

        if($data->fails()) {
            foreach ($data->errors()->all() as $message) {
                toastr()->error($message);
            }
            return back()->withInput();
        }

        // cek sort
        $is_sort = Sliders::where(['sort' => $request->sort])->first();
        if($is_sort) {
            toastr()->error('Urutan slider sudah digunakan!');
            return back()->withInput();
        }

        // store image
        $fileName = "-";
        if ($request->hasFile('image')) {
            $name = time() . '.' . $request->image->extension();
            $fileName = $request->file('image')->store('slider', 'public', $name);
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

    public function destroy(Request $request)
    {

        $slider = Sliders::find($request->id);
        // remove image local
        Storage::delete('public/' . $slider->image);
        // remove from database
        $slider->delete();
        toastr()->success('Berhasil menghapus Slider!');
        return response()->json(['success' => true]);
    }

    public function edit(Request $request)
    {
        $slider = Sliders::find($request->d);
        if($slider) {
            return view('admin.slider.edit', compact('slider'));
        }

    }

    public function update(Request $request)
    {
        $old_slider = Sliders::find($request->id);
        $post = [
            'title' => 'required',
            'description' => 'required',
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
        $fileName = $old_slider->image;
        if ($request->hasFile('image')) {
            $name = time() . '.' . $request->image->extension();
            $fileName = $request->file('image')->store('slider', 'public', $name);
            Storage::delete('public/'. $old_slider->image);
        }
        
        // cek sort
        $is_sort = Sliders::where(['sort' => $request->sort])->first();
        if($is_sort) {
            Sliders::where(['id' => $is_sort->id])->update(['sort' => $old_slider->sort]);
        }

        try {
            Sliders::where(['id' => $request->id])->update([
               'title' => $request->title,
               'description' => $request->description,
               'image' => $fileName,
               'sort' => $request->sort
            ]);

            toastr()->success('Berhasil mengubah Slider!');

        } catch (Throwable $th) {
            toastr()->error('Gagal mengubah Slider!');
        }

        return redirect()->route('slider');
    }

}
