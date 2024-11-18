<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'id_barang'; // Gunakan primary key yang sesuai
    protected $fillable = [
        'id_barang','nama_barang', 'spesifikasi', 'lokasi', 'kondisi', 'jumlah_barang', 'sumber_dana',
    ];

    // Relasi dengan Stok
    public function stok()
    {
        return $this->hasOne(Stok::class, 'id_barang');
    }

    // Relasi dengan BarangMasuk
    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'id_barang');
    }

    // Relasi dengan BarangKeluar
    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'id_barang');
    }

    // Relasi dengan PinjamBarang
    public function pinjamBarang()
    {
        return $this->hasMany(PinjamBarang::class, 'id_barang');
    }
}
