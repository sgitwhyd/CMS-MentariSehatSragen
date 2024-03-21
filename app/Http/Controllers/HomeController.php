<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function about()
    {
        return view('about');
    }

    public function teams()
    {
        return view('pengurus');
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
        return view('contact');
    }
}