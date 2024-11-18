@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8 bg-white rounded-lg shadow-xl border border-gray-200">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-500 via-blue-500 to-indigo-500 mb-8">Daftar Barang Keluar</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border p-4 text-left">Nama Barang</th>
                    <th class="border p-4 text-left">Jumlah Keluar</th>
                    <th class="border p-4 text-left">Penerima</th>
                    <th class="border p-4 text-left">Lokasi</th>
                    <th class="border p-4 text-left">Tanggal Keluar</th>
                    <th class="border p-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangKeluar as $keluar)
                    <tr>
                        <td class="border p-4">{{ $keluar->barang->nama_barang }}</td>
                        <td class="border p-4">{{ $keluar->jml_keluar }}</td>
                        <td class="border p-4">{{ $keluar->penerima }}</td>
                        <td class="border p-4">{{ $keluar->lokasi }}</td>
                        <td class="border p-4">{{ $keluar->tgl_keluar }}</td>
                        <td class="border p-4">
                            <!-- Add your action buttons here (edit, delete) -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('barang_keluar.create') }}" class="mt-8 inline-block bg-gradient-to-r from-teal-500 via-blue-600 to-purple-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition-all duration-300">
            Tambah Barang Keluar
        </a>
    </div>
@endsection
