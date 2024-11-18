<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PinjamBarang extends Model
{
    use HasFactory;

    protected $table = 'pinjam_barang';

    protected $fillable = [
        'peminjam',
        'tgl_pinjam',
        'id_barang',
        'nama_barang',
        'jml_barang',
        'tgl_kembali',
        'kondisi',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
