<?php

namespace Database\Seeders;

use App\Models\Abouts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class About extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Abouts::insert([
            [
                'content' => '<p>Yayasan Mentari Sehat Indonesia Kabupaten Sragen adalah sebuah yayasan yang bergerak di bidang kesehatan yang berlokasi di Perum Graha Sine Lestari No. A03, Sine, Sragen, Jawa Tengah 57213</p>',
            ]
        ]);
    }
}