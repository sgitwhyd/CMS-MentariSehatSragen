<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function users() {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function userStore(Request $request) {
        $is_valid = $request->validate([
            'name' =>'required',
            'username' =>'required',
            'email' =>'required',
            'password' => 'required',
            'role' =>'required',
        ]);

        if ($is_valid) {
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            return redirect()->route('user')->with('success', 'User berhasil ditambahkan');
        }
    }

    public function userDestroy(Request $request) {
        $user = User::find($request->id);
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User berhasil dihapus!',
        ]);
    }

}
