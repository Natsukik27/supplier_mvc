<!-- resources/views/barang/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8 bg-white rounded-lg shadow-xl border border-gray-200">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-500 via-blue-500 to-purple-600 mb-8">Tambah Barang Baru</h1>

        <form action="{{ route('barang.store') }}" method="POST" class="space-y-6">
            @csrf
            <!-- <div>
                <label for="id_barang" class="block text-gray-700 font-semibold">Id Barang</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="id_barang" name="id_barang" required>
            </div> -->
            <div>
                <label for="nama_barang" class="block text-gray-700 font-semibold">Nama Barang</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="nama_barang" name="nama_barang" required>
            </div>
            <div>
                <label for="spesifikasi" class="block text-gray-700 font-semibold">Spesifikasi</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="spesifikasi" name="spesifikasi" required>
            </div>
            <div>
                <label for="lokasi" class="block text-gray-700 font-semibold">Lokasi</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="lokasi" name="lokasi" required>
            </div>
            <div>
                <label for="kondisi" class="block text-gray-700 font-semibold">Kondisi</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="kondisi" name="kondisi" required>
            </div>
            <div>
                <label for="jumlah_barang" class="block text-gray-700 font-semibold">Jumlah Barang</label>
                <input type="number" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="jumlah_barang" name="jumlah_barang" required>
            </div>
            <div>
                <label for="sumber_dana" class="block text-gray-700 font-semibold">Sumber Dana</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="sumber_dana" name="sumber_dana" required>
            </div>
            <button type="submit" class="bg-gradient-to-r from-orange-400 to-red-500 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:from-red-500 hover:to-orange-400 transition-all duration-300">
                Simpan
            </button>
        </form>
    </div>
@endsection
