<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'kode_barang' => 'SMB001',
                'nama_barang' => 'Beras',
                'stok' => 100,
                'satuan' => 'kg', // <- Tambahan satuan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_barang' => 'SMB002',
                'nama_barang' => 'Minyak Goreng',
                'stok' => 80,
                'satuan' => 'liter', // <- Tambahan satuan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_barang' => 'SMB003',
                'nama_barang' => 'Gula Pasir',
                'stok' => 60,
                'satuan' => 'kg', // <- Tambahan satuan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_barang' => 'SMB004',
                'nama_barang' => 'Telur Ayam',
                'stok' => 50,
                'satuan' => 'kg', // <- Tambahan satuan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_barang' => 'SMB005',
                'nama_barang' => 'Mie Instan',
                'stok' => 40,
                'satuan' => 'dus', // <- Tambahan satuan
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}