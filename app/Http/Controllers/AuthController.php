<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('about');
        } else {
            return view('admin.auth.login');
        }
    }

    public function loginVerify(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        if (Auth::Attempt($data)) {
            toastr()->success('Berhasil Login');
            return redirect()->route('about');
            
        } else {
            toastr()->error('Username atau Password Salah');
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        Session::flash('user', 'profile');
        return redirect('/login');
    }
}
