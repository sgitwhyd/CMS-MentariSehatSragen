<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Profiles;

class AuthController extends Controller
{
    public function login()
    {
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
    
            return redirect('admin');
            
        } else {
            Session::flash('error', 'Username atau Password Salah');
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
