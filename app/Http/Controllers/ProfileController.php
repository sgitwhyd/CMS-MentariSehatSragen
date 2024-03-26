<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Throwable;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::find(auth()->user()->id);
        return view('admin.profile.index', compact('profile'));
    }

    public function changePassword(Request $request)
    {
        $user = User::find($request->id);
        // cek old password
        $old_password = Hash::check($request->oldpassword, $user->password);
        if(!$old_password) {
            toastr()->error('Password lama salah!');
            return back()->withInput();
        }
        // cek confirm password
        if($request->newpassword!= $request->renewpassword) {
            toastr()->error('Konfirmasi password salah!');
            return back()->withInput();
        }
        // update password
        try {
            User::where(['id' => $request->id])->update([
                'password' => Hash::make($request->newpassword)
            ]);
            toastr()->success('Berhasil mengubah password!');

        } catch (Throwable $th) {
            toastr()->error('Gagal mengubah password!');
        }

        return redirect()->route('profile');

    }
}
