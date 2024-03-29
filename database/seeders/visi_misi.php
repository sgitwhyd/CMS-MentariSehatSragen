<?php

namespace Database\Seeders;

use App\Models\VisiMisies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class visi_misi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiMisies::insert([
            [
                'content_visi' => '<p>Menjadi yayasan yang bergerak di bidang kesehatan yang terpercaya dan terdepan dalam memberikan pelayanan kesehatan kepada masyarakat</p>',
                'content_misi' => '<p>1. Memberikan pelayanan kesehatan yang terbaik kepada masyarakat</p><p>2. Menjadi yayasan yang terdepan dalam memberikan pelayanan kesehatan kepada masyarakat</p><p>3. Menjadi yayasan yang terpercaya dalam memberikan pelayanan kesehatan kepada masyarakat</p>'
            ]
        ]);
    }
}