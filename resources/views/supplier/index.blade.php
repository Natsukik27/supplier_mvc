@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 mb-8">Daftar Supplier</h1>

        <a href="{{ route('supplier.create') }}" class="bg-gradient-to-r from-teal-500 via-blue-600 to-purple-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:scale-105 transition-transform duration-300 mb-8 inline-block">
            Tambah Supplier Baru
        </a>

        <div class="overflow-hidden rounded-lg shadow-lg">
            <table class="min-w-full bg-gray-100 border border-gray-300">
                <thead class="bg-gradient-to-r from-indigo-500 to-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Nama Supplier</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Alamat</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Telepon</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300 bg-white">
                    @foreach($suppliers as $supplier)
                        <tr class="hover:bg-gray-200 transition-colors duration-300">
                            <td class="px-6 py-4 text-gray-800">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $supplier->nama_supplier }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $supplier->alamat_supplier }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $supplier->telp_supplier }}</td>
                            <td class="px-6 py-4 space-x-2"> <!-- Add space-x-2 here -->
                                <a href="{{ route('supplier.show', $supplier->id_supplier) }}" class="bg-blue-500 text-white font-semibold px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition-all duration-300">
                                    Detail
                                </a>
                                <a href="{{ route('supplier.edit', $supplier->id_supplier) }}" class="bg-yellow-500 text-white font-semibold px-4 py-2 rounded-md shadow-md hover:bg-yellow-600 transition-all duration-300">
                                    Edit
                                </a>
                                <form action="{{ route('supplier.destroy', $supplier->id_supplier) }}" method="POST" class="inline-block">
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
