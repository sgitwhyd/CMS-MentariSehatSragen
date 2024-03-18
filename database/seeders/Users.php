<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Johan saputra',
                'username' => 'Johan',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'ADMIN',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Aulia putri',
                'username' => 'Aulia',
                'email' => 'staff@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'STAFF',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ]
         
        ]);
    }
}
