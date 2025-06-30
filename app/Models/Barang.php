<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['kode_barang', 'nama_barang', 'stok', 'satuan']; 
    
    public function masuk() {
        return $this->hasMany(BarangMasuk::class);
    }

    public function keluar() {
        return $this->hasMany(BarangKeluar::class);
    }
}
