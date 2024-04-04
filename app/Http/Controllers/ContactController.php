<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function contact()
    {
        $contact = Contacts::get()->last();
        return view('admin.contact.index', compact('contact'));
    }

    public function contactStore(Request $request)
    {

        $old_contact = Contacts::get()->last();
        if($old_contact) {
            Contacts::where('id', $old_contact->id)->update([
                'alamat' => $request->alamat ? $request->alamat : $old_contact->alamat,
                'email' => $request->email ? $request->email : $old_contact->email,
                'no_telp' => $request->no_telp ? $request->no_telp : $old_contact->no_telp,
                'maps' => $request->maps ? $request->maps : $old_contact->maps,
            ]);
            toastr()->success('Data Berhasil Diupdate');
            return redirect()->route('contact');
        } else {
            $is_valid = $request->validate([
                'alamat' => 'required',
                'email' =>'required',
                'no_telp' =>'required',
                'maps' =>'required',
            ]);

            if($is_valid) {
                Contacts::create([
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'no_telp' => $request->no_telp,
                    'maps' => $request->maps,
                ]);
                toastr()->success('Data Berhasil Ditambahkan');
                return redirect()->route('contact');
            }
        }

    }
}
