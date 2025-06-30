<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;

class BarangMasukSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kode_barang' => 'SMB001', 'jumlah' => 30, 'tanggal' => '2025-06-01'],
            ['kode_barang' => 'SMB003', 'jumlah' => 20, 'tanggal' => '2025-06-03'],
            ['kode_barang' => 'SMB005', 'jumlah' => 25, 'tanggal' => '2025-06-05'],
        ];

        foreach ($data as $item) {
            $barang = Barang::where('kode_barang', $item['kode_barang'])->first();

            if ($barang) {
                DB::table('barang_masuks')->insert([
                    'barang_id' => $barang->id,
                    'jumlah' => $item['jumlah'],
                    'satuan' => $barang->satuan, // <- Ambil dari tabel barangs
                    'tanggal_masuk' => $item['tanggal'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                echo "Barang dengan kode {$item['kode_barang']} tidak ditemukan.\n";
            }
        }
    }
}