<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Abouts;
use App\Models\Footers;
use App\Models\Teams;
use App\Models\VisiMisies;
use App\Models\Sliders;


class HomeController extends Controller
{
    public function index() {
         
        return view('dashboard');
    }
    
    public function about() {
        $about = Abouts::get()->last();
        return view('about', compact('about'));
    }

    public function teams() {
        return view('pengurus');
    }

    public function blog() {
        return view('blog');
    }

    public function detailBlog($id) {
        return view('blog-detail');
    }

    public function contact() {
        return view('contact');
    }
}
