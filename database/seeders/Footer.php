<?php

namespace Database\Seeders;

use App\Models\Footers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Footer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Footers::insert([
            [
                'title' => 'Yayasan Mentari Sehat Indonesia Kabupaten Sragen',
                'alamat' => 'Perum Graha Sine Lestari No. A03, Sine, Sragen, Jawa Tengah 57213',
                'no_telp' => '+62 856-4240-0672',
                'facebook' => null,
                'instagram' => null,
                'twitter' => null,
                'youtube' => null,
                'tiktok' => null,
                 'email' => 'Ssr.msi.kab.sragen@gmail.com',
                
            ]
        ]);
    }
}