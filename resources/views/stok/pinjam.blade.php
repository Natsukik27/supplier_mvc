@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8 bg-white rounded-lg shadow-xl border border-gray-200">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 via-red-500 to-pink-500 mb-8">Pinjam Barang</h1>

        <form action="{{ route('pinjam.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="id_barang" class="block text-gray-700 font-semibold">Nama Barang</label>
                <select name="id_barang" id="id_barang" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="jml_barang" class="block text-gray-700 font-semibold">Jumlah Barang</label>
                <input type="number" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="jml_barang" name="jml_barang" required>
            </div>
            <div>
                <label for="peminjam" class="block text-gray-700 font-semibold">Peminjam</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="peminjam" name="peminjam" required>
            </div>
            <div>
                <label for="tgl_pinjam" class="block text-gray-700 font-semibold">Tanggal Pinjam</label>
                <input type="date" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="tgl_pinjam" name="tgl_pinjam" required>
            </div>
            <div>
                <label for="kondisi" class="block text-gray-700 font-semibold">Kondisi Barang</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="kondisi" name="kondisi" required>
            </div>
            <button type="submit" class="bg-gradient-to-r from-teal-500 via-blue-600 to-purple-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition-all duration-300">
                Simpan Pinjaman
            </button>
        </form>
    </div>
@endsection
