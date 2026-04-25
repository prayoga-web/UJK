@extends('layouts.master')

@section('content')
{{-- Header Section dengan Gradient Background --}}
<div class="bg-gradient-to-r from-indigo-600 to-violet-600 rounded-2xl p-8 mb-8 text-white shadow-lg shadow-indigo-200 relative overflow-hidden">
    <div class="relative z-10">
        <h2 class="text-3xl font-bold mb-2">Daftar Inventaris Barang</h2>
        <p class="opacity-80">Lihat dan kelola stok barang untuk setiap kategori.</p>
    </div>
    <div class="absolute right-8 top-1/2 -translate-y-1/2" style="z-index: 999;">
        <a href="{{ url('/dashboard') }}" class="bg-white hover:bg-gray-100 text-indigo-600 px-4 py-2 rounded-lg transition flex items-center gap-2 text-sm shadow-md font-bold">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

{{-- Main Content Card --}}
<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    {{-- Header dengan Tombol Tambah (Hanya Admin) --}}
    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
        <h3 class="font-bold text-indigo-900">Data Master Barang</h3>
        @if(auth()->user()->role == 'admin')
        <a href="{{ route('items.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg transition flex items-center gap-2 text-sm shadow-md shadow-indigo-100">
            <i class="fas fa-plus"></i> Tambah Barang
        </a>
        @endif
    </div>

    {{-- Form Pencarian --}}
    <div class="p-6 border-b border-slate-100 bg-slate-50">
        <form method="GET" action="{{ route('items.index') }}" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label for="nama_barang" class="block text-sm font-medium text-slate-700 mb-2">Cari Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" value="{{ request('nama_barang') }}" 
                       placeholder="Masukkan nama barang..." 
                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="flex-1 min-w-[200px]">
                <label for="kategori" class="block text-sm font-medium text-slate-700 mb-2">Cari Kategori</label>
                <input type="text" name="kategori" id="kategori" value="{{ request('kategori') }}" 
                       placeholder="Masukkan kategori..." 
                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition flex items-center gap-2 text-sm shadow-md shadow-indigo-100">
                    <i class="fas fa-search"></i> Cari
                </button>
                <a href="{{ route('items.index') }}" class="bg-slate-500 hover:bg-slate-600 text-white px-4 py-2 rounded-lg transition flex items-center gap-2 text-sm shadow-md">
                    <i class="fas fa-times"></i> Reset
                </a>
            </div>
        </form>
    </div>

    {{-- Tabel Data Barang --}}
    <table class="w-full text-left">
        {{-- Header Tabel --}}
        <thead class="bg-slate-50 text-slate-400 text-[11px] uppercase tracking-wider">
            <tr>
                <th class="px-6 py-4">Nama Barang</th>
                <th class="px-6 py-4">Kategori</th>
                <th class="px-6 py-4">Supplier</th>
                <th class="px-6 py-4">Stok</th>
                <th class="px-6 py-4">Harga</th>
                @if(auth()->user()->role == 'admin')
                <th class="px-6 py-4 text-center">Aksi</th>
                @endif
            </tr>
        </thead>
        {{-- Body Tabel --}}
        <tbody class="divide-y divide-slate-100 text-sm">
            @foreach($items as $item)
            <tr class="hover:bg-slate-50 transition">
                {{-- Nama Barang --}}
                <td class="px-6 py-4 text-slate-700">{{ $item->nama_barang }}</td>
                {{-- Kategori --}}
                <td class="px-6 py-4 text-slate-500">{{ $item->category->nama_kategori ?? '-' }}</td>
                {{-- Supplier --}}
                <td class="px-6 py-4 text-slate-500">{{ $item->supplier->nama_supplier ?? '-' }}</td>
                {{-- Stok dengan Format Unit --}}
                <td class="px-6 py-4 text-slate-700 font-medium">{{ $item->stok }} Unit</td>
                {{-- Harga dengan Format Rupiah --}}
                <td class="px-6 py-4 text-slate-700">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                {{-- Kolom Aksi (Edit & Hapus) - Hanya untuk Admin --}}
                @if(auth()->user()->role == 'admin')
                <td class="px-6 py-4">
                    <div class="flex justify-center gap-2">
                        {{-- Tombol Edit --}}
                        <a href="{{ route('items.edit', $item->id) }}" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition">
                            <i class="fas fa-edit"></i>
                        </a>
                        {{-- Tombol Hapus dengan Konfirmasi --}}
                        <form id="delete-form-{{ $item->id }}" action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="button" onclick="confirmDelete('{{ $item->id }}')" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection