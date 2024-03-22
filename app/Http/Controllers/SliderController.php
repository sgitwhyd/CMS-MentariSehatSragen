<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Sliders;

class SliderController extends Controller
{
    public function slider()
    {
        $slider = Sliders::orderBy('id', 'DESC')->limit(3)->get();
        return view('admin.slider.index', compact('slider'));
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

    public function destroy(Request $request) {

        $slider = Sliders::find($request->id);
        // remove image local
        unlink(public_path('images/slider/').$slider->image);
        // remove from database
        $slider->delete();

        return response()->json(['success' => 'Slider berhasil dihapus']);
    }
}
