@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8 bg-white rounded-lg shadow-xl border border-gray-200">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 via-red-500 to-pink-500 mb-8">Edit Barang</h1>

        <form action="{{ route('barang.update', $barang->id_barang) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="nama_barang" class="block text-gray-700 font-semibold">Nama Barang</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" required>
            </div>
            <div>
                <label for="spesifikasi" class="block text-gray-700 font-semibold">Spesifikasi</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="spesifikasi" name="spesifikasi" value="{{ $barang->spesifikasi }}" required>
            </div>
            <div>
                <label for="lokasi" class="block text-gray-700 font-semibold">Lokasi</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="lokasi" name="lokasi" value="{{ $barang->lokasi }}" required>
            </div>
            <div>
                <label for="kondisi" class="block text-gray-700 font-semibold">Kondisi</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="kondisi" name="kondisi" value="{{ $barang->kondisi }}" required>
            </div>
            <div>
                <label for="jumlah_barang" class="block text-gray-700 font-semibold">Jumlah Barang</label>
                <input type="number" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="jumlah_barang" name="jumlah_barang" value="{{ $barang->jumlah_barang }}" required>
            </div>
            <div>
                <label for="sumber_dana" class="block text-gray-700 font-semibold">Sumber Dana</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="sumber_dana" name="sumber_dana" value="{{ $barang->sumber_dana }}" required>
            </div>
            <button type="submit" class="bg-gradient-to-r from-red-400 to-yellow-500 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:from-yellow-500 hover:to-red-400 transition-all duration-300">
                Update
            </button>
        </form>
    </div>
@endsection
