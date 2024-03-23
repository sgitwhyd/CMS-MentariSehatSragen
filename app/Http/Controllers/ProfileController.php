<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Profiles;
use App\Models\User;

class ProfileController extends Controller
{
    public function index() {
        $profile = Profiles::with('user')->find(1);
        return view('admin.profile.index', compact('profile'));
    }

    public function store(Request $request) {
        $old_profile = Profiles::find($request->id);
        $old_user = User::find($old_profile->user_id);
        // validation
        $data = Validator::make($request->all(), [
            'username' =>'required',
            'full_name' => 'required',
            'company' =>'required',
            'job' =>'required',
            'address' =>'required',
            'phone' =>'required|numeric',
        ]);

        if($data->fails()) {
            foreach ($data->errors()->all() as $message) {
                toastr()->error($message);
            }
            return back()->withInput();
        }
        // store profile
        try {
            Profiles::where(['id' => $request->id])->update([
               'full_name' => $request->full_name,
               'company' => $request->company,
               'job' => $request->job,
               'address' => $request->address,
               'phone' => $request->phone
            ]);
            User::where(['id' => $old_profile->user_id])->update([
                'username' => $request->username
            ]);

            toastr()->success('Berhasil mengubah Profile!');

        } catch (Throwable $th) {
            toastr()->error('Gagal mengubah Profile!');
        }

        return redirect()->route('profile');

    }

    public function changePassword(Request $request) { 
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
