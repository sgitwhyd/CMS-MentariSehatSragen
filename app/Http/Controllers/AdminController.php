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
