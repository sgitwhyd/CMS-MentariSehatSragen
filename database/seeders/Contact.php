<?php

namespace Database\Seeders;

use App\Models\Contacts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Contact extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contacts::insert([
            [
                'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.330894060044!2d111.0053604!3d-7.4285865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a0300539f3e27%3A0x8bc831aef60849cd!2sYayasan%20Mentari%20Sehat%20Indonesia%20Kab.Sragen!5e0!3m2!1sid!2sid!4v1711559230428!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'alamat' => 'Perum Graha Sine Lestari No. A03, Sine, Sragen, Jawa Tengah 57213',
                'email' => 'Ssr.msi.kab.sragen@gmail.com',
                'no_telp' => '+62 856-4240-0672'
            ]
        ]);
    }
}