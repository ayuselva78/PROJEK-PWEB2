<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BarangSeeder::class,
            BarangMasukSeeder::class,
            BarangKeluarSeeder::class,
        ]);

        // Buat user admin
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
    }
}
