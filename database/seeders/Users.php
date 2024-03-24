<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profiles;

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
                'password' => Hash::make('12345'),
                'role' => 'ADMIN',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Aulia putri',
                'username' => 'Aulia',
                'email' => 'staff@gmail.com',
                'password' => Hash::make('12345'),
                'role' => 'STAFF',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
        Profiles::insert([
            [
                'user_id' => '1',
                'full_name' => 'Johan Saputra Nugroho',
                'company' => 'Mentari sehat indonesia',
                'job' => 'Manager Marketing',
                'phone' => '081234567890',
                'address' => 'Jl. Kebon Jeruk No. 123',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => '2',
                'full_name' => 'Aulia Putri',
                'company' => 'Mentari sehat indonesia',
                'job' => 'Manager Operation',
                'phone' => '081234567890',
                'address' => 'Jl. Kebon Jeruk No. 123',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
