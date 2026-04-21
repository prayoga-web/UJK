@extends('layouts.master')

@section('content')
{{-- Header Section dengan Gradient Background --}}
<div class="bg-gradient-to-r from-indigo-600 to-violet-600 rounded-2xl p-8 mb-8 text-white shadow-lg shadow-indigo-200 relative overflow-hidden">
    <div class="relative z-10">
        <h2 class="text-3xl font-bold mb-2">Tambah Barang Baru</h2>
        <p class="opacity-80">Masukkan data barang inventaris baru ke dalam sistem.</p>
    </div>
    <div class="absolute right-8 top-1/2 -translate-y-1/2" style="z-index: 999;">
        <a href="{{ url('/items') }}" class="bg-white hover:bg-gray-100 text-indigo-600 px-4 py-2 rounded-lg transition flex items-center gap-2 text-sm shadow-md font-bold">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

{{-- Container Form Tambah Barang --}}
<div class="max-w-2xl mx-auto bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100">

    {{-- Form untuk Menambah Barang Baru --}}
    <form action="{{ route('items.store') }}" method="POST" class="space-y-6">
        @csrf
        {{-- Input Nama Barang --}}
        <div>
            <label class="block text-slate-700 text-sm font-semibold mb-2">Nama Barang</label>
            <input type="text" name="nama_barang" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all" placeholder="Masukkan nama barang" required>
        </div>

        {{-- Input Kategori dan Stok (Side by Side) --}}
        <div class="grid grid-cols-2 gap-4">
            {{-- Input Kategori --}}
            <div>
                <label class="block text-slate-700 text-sm font-semibold mb-2">Kategori</label>
                <input type="text" name="kategori" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all" placeholder="Contoh: Elektronik" required>
            </div>
            {{-- Input Stok --}}
            <div>
                <label class="block text-slate-700 text-sm font-semibold mb-2">Stok</label>
                <input type="number" name="stok" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all" placeholder="0" required>
            </div>
        </div>

        {{-- Input Harga dengan Prefix Rp --}}
        <div>
            <label class="block text-slate-700 text-sm font-semibold mb-2">Harga (Rupiah)</label>
            <div class="relative">
                {{-- Prefix "Rp" di sebelah kiri input --}}
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-medium">Rp</span>
                <input type="number" name="harga" value="{{ $item->harga ?? '' }}" placeholder="Contoh: 150000" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-12 pr-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all" required>
            </div>
            {{-- Catatan Instruksi Input --}}
            <p class="text-[10px] text-slate-400 mt-1">*Masukkan angka saja (tanpa titik/koma)</p>
        </div>

        {{-- Tombol Submit --}}
        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-indigo-200 transition duration-300 transform active:scale-[0.98]">
            + SIMPAN DATA
        </button>
    </form>
</div>
@endsection