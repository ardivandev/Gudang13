<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Petugas;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        Petugas::create([
            'nama_lengkap' => 'Admin Petugas',
            'email' => 'petugas@example.com',
            'password' => Hash::make('password123'),
            'nip' => '1234567890',
        ]);
    }
}