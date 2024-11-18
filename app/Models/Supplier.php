<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';
    protected $fillable = [
        'nama_supplier', 'alamat_supplier', 'telp_supplier',
    ];

    // Relasi dengan BarangMasuk
    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'id_supplier');
    }
}
