<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class AdminController extends Controller
{
    public function index() {
        // auth check
        // 
        return view('admin.dashboard');
    }

    public function about() {
        return view('admin.about');
    }

    public function teams() {
        return view('admin.pengurus');
    }

    public function blog() {
        return view('admin.blog');
    }

    public function contact() {
        return view('admin.contact');
    }

    public function detailBlog($id) {
        return view('admin.blog-detail');
    }

    public function footer() {
        return view('admin.footer');
    }

    public function footerStore(Request $request) {
        dd($request->all());

       $is_valid = $request->validate([
            'title' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'image' => 'required|file',
       ]);


       if($is_valid) {

       }
    }

}
