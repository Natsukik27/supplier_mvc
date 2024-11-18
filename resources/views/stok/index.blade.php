@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 mb-8">Daftar Stok</h1>

        <a href="{{ route('stok.create') }}" class="bg-gradient-to-r from-teal-500 via-blue-600 to-purple-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:scale-105 transition-transform duration-300 mb-8 inline-block">
            Tambah Stok Baru
        </a>

        <div class="overflow-hidden rounded-lg shadow-lg">
            <table class="min-w-full bg-gray-100 border border-gray-300">
                <thead class="bg-gradient-to-r from-indigo-500 to-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Nama Barang</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Jumlah Masuk</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Jumlah Keluar</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Total Barang</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300 bg-white">
                    @foreach($stoks as $stok)
                        <tr class="hover:bg-gray-200 transition-colors duration-300">
                            <td class="px-6 py-4 text-gray-800">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $stok->nama_barang }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $stok->jml_masuk }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $stok->jml_keluar }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $stok->total_barang }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('stok.show', $stok->id_barang) }}" class="bg-blue-500 text-white font-semibold px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition-all duration-300">
                                    Detail
                                </a>
                                <a href="{{ route('stok.edit', $stok->id_barang) }}" class="bg-yellow-500 text-white font-semibold px-4 py-2 rounded-md shadow-md hover:bg-yellow-600 transition-all duration-300">
                                    Edit
                                </a>
                                <form action="{{ route('stok.destroy', $stok->id_barang) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white font-semibold px-4 py-2 rounded-md shadow-md hover:bg-red-600 transition-all duration-300">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
