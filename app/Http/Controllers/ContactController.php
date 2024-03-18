<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function contact() {
        $contact = Contacts::get()->last();
        return view('admin.contact.index', compact('contact'));
    }

    public function contactStore(Request $request) {
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
            return redirect()->route('contact')->with('success', 'Data Berhasil Ditambahkan');
        }

    }
}
