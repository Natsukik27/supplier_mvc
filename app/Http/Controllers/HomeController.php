<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Stok;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Menampilkan dashboard home
    public function index()
    {
// Menghitung total stok barang
$totalBarangMasuk = BarangMasuk::sum('jml_masuk');  // Total barang yang masuk
$totalBarangKeluar = BarangKeluar::sum('jml_keluar');  // Total barang yang keluar

// Total stok = barang masuk - barang keluar
$totalStok = $totalBarangMasuk - $totalBarangKeluar;

// Ambil data barang masuk dan keluar untuk ditampilkan di dashboard
$barangMasuk = BarangMasuk::with('barang', 'supplier')->latest()->take(5)->get();
$barangKeluar = BarangKeluar::with('barang', 'supplier')->latest()->take(5)->get();

// Ambil data total barang dan supplier jika perlu
$totalBarang = Barang::count();  // Total barang
$totalSupplier = Supplier::count();  // Total supplier

        // Mengirim data ke view
        return view('home.index', compact('totalBarang', 'totalSupplier', 'totalStok', 'barangMasuk', 'barangKeluar'));
    }
}
