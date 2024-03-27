<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Abouts;
use App\Models\Contacts;
use App\Models\Footers;
use App\Models\Teams;
use App\Models\VisiMisies;
use App\Models\Sliders;

class HomeController extends Controller
{
    public function index()
    {
        $about = Abouts::get()->last();
        $visimisi = VisiMisies::get()->last();
        $blogs = Blog::orderBy('created_at', 'desc')->limit(3)->get();
        $teams = Teams::orderBy('sort', 'asc')->get();
        $sliders = Sliders::orderBy('sort', 'asc')->get();
        return view('index', compact('about', 'visimisi', 'blogs', 'teams', 'sliders'));
    }
    
    public function about()
    {
        $about = Abouts::get()->last();
        return view('about', compact('about'));
    }

    public function teams()
    {
        $teams = Teams::orderBy('sort', 'asc')->get();
        return view('pengurus', compact('teams'));
    }

    public function blog()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('blog', compact('blogs'));
    }

    public function detailBlog(Blog $blog)
    {
        return view('blog-detail', compact('blog'));
    
    }

    public function contact()
    {
        $contact = Contacts::get()->last();
        return view('contact', compact('contact'));
    }
}
