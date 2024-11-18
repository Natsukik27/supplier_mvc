<!-- resources/views/stok/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 via-red-500 to-pink-500 mb-8">Detail Stok</h1>

        <div class="bg-white p-8 rounded-lg shadow-xl border border-gray-200">
            <p class="font-semibold text-lg text-gray-700">Nama Barang: {{ $stok->nama_barang }}</p>
            <p class="font-semibold text-lg text-gray-700">Jumlah Masuk: {{ $stok->jml_masuk }}</p>
            <p class="font-semibold text-lg text-gray-700">Jumlah Keluar: {{ $stok->jml_keluar }}</p>
            <p class="font-semibold text-lg text-gray-700">Total Barang: {{ $stok->total_barang }}</p>

            <div class="mt-4">
                <a href="{{ route('stok.edit', $stok->id) }}" class="bg-yellow-500 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-yellow-600 transition-all duration-300">
                    Edit Stok
                </a>
                <a href="{{ route('stok.index') }}" class="bg-gray-500 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-gray-600 transition-all duration-300">
                    Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
