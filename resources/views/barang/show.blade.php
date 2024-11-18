@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 mb-8">Detail Barang</h1>

        <!-- Detail Barang -->
        <div class="bg-white p-8 rounded-lg shadow-xl border border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Nama Barang</h2>
                    <p class="text-lg text-gray-700">{{ $barang->nama_barang }}</p>
                </div>
                <div>
                    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Spesifikasi</h2>
                    <p class="text-lg text-gray-700">{{ $barang->spesifikasi }}</p>
                </div>
                <div>
                    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Lokasi</h2>
                    <p class="text-lg text-gray-700">{{ $barang->lokasi }}</p>
                </div>
                <div>
                    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Kondisi</h2>
                    <p class="text-lg text-gray-700">{{ $barang->kondisi }}</p>
                </div>
                <div>
                    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Jumlah Barang</h2>
                    <p class="text-lg text-gray-700">{{ $barang->jumlah_barang }}</p>
                </div>
                <div>
                    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Sumber Dana</h2>
                    <p class="text-lg text-gray-700">{{ $barang->sumber_dana }}</p>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-8">
                <a href="{{ route('barang.index') }}" class="bg-gradient-to-r from-teal-500 via-blue-600 to-purple-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
                    Kembali ke Daftar Barang
                </a>
            </div>
        </div>
    </div>
@endsection
