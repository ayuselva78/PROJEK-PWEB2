<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;

class BarangKeluarSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kode_barang' => 'SMB001', 'jumlah' => 10, 'tanggal' => '2025-06-10'],
            ['kode_barang' => 'SMB002', 'jumlah' => 15, 'tanggal' => '2025-06-12'],
            ['kode_barang' => 'SMB004', 'jumlah' => 8,  'tanggal' => '2025-06-15'],
        ];

        foreach ($data as $item) {
            $barang = Barang::where('kode_barang', $item['kode_barang'])->first();

            if ($barang) {
                DB::table('barang_keluars')->insert([
                    'barang_id' => $barang->id,
                    'jumlah' => $item['jumlah'],
                    'satuan' => $barang->satuan, // <- Ambil dari tabel barangs
                    'tanggal_keluar' => $item['tanggal'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                echo "Barang dengan kode {$item['kode_barang']} tidak ditemukan.\n";
            }
        }
    }
}