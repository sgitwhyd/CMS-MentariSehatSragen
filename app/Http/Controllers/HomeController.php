<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('dashboard');
    }

    public function about() {
        return view('about');
    }

    public function teams() {
        return view('pengurus');
    }

    public function blog() {
        return view('blog');
    }

    public function contact() {
        return view('contact');
    }
}
