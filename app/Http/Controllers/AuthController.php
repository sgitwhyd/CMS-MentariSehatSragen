<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class AuthController extends Controller
{
    public function login() {
        if (Auth::check()) {
            $user = Auth::user();
            return redirect('admin');
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
            $user = Auth::user();
            Session::put('user', $user);
            return redirect('admin');
            
        } else {
            Session::flash('error', 'Username atau Password Salah');
            return redirect('/login');
        }
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }
}
