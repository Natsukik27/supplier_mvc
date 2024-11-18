<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    protected $table = 'stok';
    protected $fillable = [
        'id_barang', 'nama_barang', 'jml_masuk', 'jml_keluar', 'jml_pinjam', 'total_barang'
    ];

    // Relasi dengan Barang Masuk
    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'id_barang', 'id_barang');
    }

    // Relasi dengan Barang Keluar
    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'id_barang', 'id_barang');
    }

    // Relasi dengan Pinjam Barang
    public function pinjamBarang()
    {
        return $this->hasMany(PinjamBarang::class, 'id_barang', 'id_barang');
    }

    // Menambahkan logika untuk menghitung stok
    public function hitungStok()
    {
        $barangMasuk = $this->barangMasuk()->sum('jml_masuk');
        $barangKeluar = $this->barangKeluar()->sum('jml_keluar');
        $barangPinjam = $this->pinjamBarang()->whereNull('tgl_kembali')->sum('jml_barang');

        $this->total_barang = $barangMasuk - $barangKeluar - $barangPinjam;
        $this->save();
    }
}
