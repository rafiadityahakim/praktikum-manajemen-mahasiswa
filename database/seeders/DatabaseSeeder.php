<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // 2. Buat Akun User Biasa
        User::create([
            'name' => 'User Mahasiswa',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        // 3. Buat Data Dummy Mahasiswa
        Mahasiswa::create([
            'nim' => '220001',
            'nama' => 'Budi Santoso',
            'program_studi' => 'Informatika',
            'email' => 'budi@student.ac.id',
            'angkatan' => '2022',
        ]);

        Mahasiswa::create([
            'nim' => '220002',
            'nama' => 'Siti Rahma',
            'program_studi' => 'Sistem Informasi',
            'email' => 'siti@student.ac.id',
            'angkatan' => '2022',
        ]);
    }
}