@extends('layouts.master')

@section('content')
{{-- Header Dashboard dengan Welcome Message --}}
<div class="bg-gradient-to-r from-indigo-600 to-violet-600 rounded-2xl p-8 mb-8 text-white shadow-lg shadow-indigo-200">
    <h2 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
    <p class="opacity-80">Pusat Kendali L-Store: Ikhtisar Real-time Aset & Pergerakan Stok per tanggal {{ now()->format('d F Y') }}.</p>
</div>

{{-- Grid Statistik 4 Kolom --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    {{-- Card 1: Total Barang --}}
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-5">
        <div class="w-14 h-14 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 text-2xl">
            <i class="fas fa-box"></i>
        </div>
        <div>
            <p class="text-slate-500 text-sm">Total Barang</p>
            <h3 class="text-2xl font-bold text-slate-800">{{ $totalBarang }}</h3>
        </div>
    </div>

    {{-- Card 2: Total Kategori --}}
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-5">
        <div class="w-14 h-14 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 text-2xl">
            <i class="fas fa-layer-group"></i>
        </div>
        <div>
            <p class="text-slate-500 text-sm">Total Kategori</p>
            <h3 class="text-2xl font-bold text-slate-800">{{ $totalKategori }}</h3>
        </div>
    </div>

    {{-- Card 3: Total Stok --}}
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-5">
        <div class="w-14 h-14 bg-amber-50 rounded-xl flex items-center justify-center text-amber-600 text-2xl">
            <i class="fas fa-warehouse"></i>
        </div>
        <div>
            <p class="text-slate-500 text-sm">Total Stok</p>
            <h3 class="text-2xl font-bold text-slate-800">{{ $totalStok }}</h3>
        </div>
    </div>

    {{-- Card 4: Stok Kritis --}}
    <div class="bg-white p-6 rounded-3xl shadow-sm border border-amber-100">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-600">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium">Perlu Restok</p>
                <h3 class="text-2xl font-bold text-slate-800">
                    {{ $stokKritis }} <span class="text-xs font-normal">Item</span>
                </h3>
            </div>
        </div>
    </div>
</div>

{{-- Card Barang Terbaru --}}
<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    {{-- Header Card --}}
    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
        <h3 class="font-bold text-indigo-900">Barang Terbaru</h3>
        <a href="{{ route('items.index') }}" class="text-indigo-600 text-sm font-semibold hover:underline">Lihat Semua</a>
    </div>
    {{-- Tabel Barang Terbaru --}}
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            {{-- Header Tabel --}}
            <thead class="bg-slate-50 text-slate-400 text-[11px] uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4">Nama Barang</th>
                    <th class="px-6 py-4">Kategori</th>
                    <th class="px-6 py-4">Harga</th>
                </tr>
            </thead>
            {{-- Body Tabel dengan Kondisi Jika Ada Data --}}
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($recentItems as $item)
                <tr class="hover:bg-slate-50 transition">
                    {{-- Nama Barang --}}
                    <td class="px-6 py-4 text-slate-700 font-medium">{{ $item->nama_barang }}</td>
                    {{-- Kategori dengan Badge --}}
                    <td class="px-6 py-4">
                        <span class="bg-indigo-50 text-indigo-600 px-3 py-1 rounded-full text-xs font-semibold">
                            {{ $item->kategori }}
                        </span>
                    </td>
                    {{-- Harga dengan Format Rupiah --}}
                    <td class="px-6 py-4 text-slate-600">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                </tr>
                {{-- Pesan jika Belum Ada Data --}}
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-8 text-center text-slate-400">Belum ada data barang.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection