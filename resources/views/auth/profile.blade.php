@extends('layouts.master')

@section('content')
{{-- Header Section dengan Gradient Background --}}
<div class="bg-gradient-to-r from-indigo-600 to-violet-600 rounded-2xl p-8 mb-8 text-white shadow-lg shadow-indigo-200 relative overflow-hidden">
    <div class="relative z-10">
        <h2 class="text-3xl font-bold mb-2">Edit Profil</h2>
        <p class="opacity-80">Perbarui informasi akun Anda.</p>
    </div>
    <div class="absolute right-8 top-1/2 -translate-y-1/2" style="z-index: 999;">
        <a href="{{ url('/dashboard') }}" class="bg-white hover:bg-gray-100 text-indigo-600 px-4 py-2 rounded-lg transition flex items-center gap-2 text-sm shadow-md font-bold">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

{{-- Container Form Edit Profil --}}
<div class="max-w-2xl mx-auto bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100">

    {{-- Error Messages --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
            <p class="text-red-800 font-semibold mb-2 flex items-center gap-2">
                <i class="fas fa-exclamation-circle"></i> Terjadi kesalahan:
            </p>
            <ul class="list-disc list-inside text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form untuk Update Profil - Ditambahkan ID untuk JavaScript --}}
    <form action="{{ route('profile.update') }}" method="POST" id="profile-form" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Nama Lengkap --}}
        <div>
            <label class="block text-slate-700 text-sm font-semibold mb-2">Nama Lengkap</label>
            <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all" required>
            @error('name')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label class="block text-slate-700 text-sm font-semibold mb-2">Email</label>
            <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all" required>
            @error('email')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        {{-- Role (read-only) --}}
        <div>
            <label class="block text-slate-700 text-sm font-semibold mb-2">Role</label>
            <input type="text" value="{{ ucfirst(Auth::user()->role) }}" class="w-full bg-slate-100 border border-slate-200 rounded-xl px-4 py-3 text-slate-600 cursor-not-allowed" disabled>
        </div>

        {{-- Divider --}}
        <div class="border-t-2 border-slate-200 my-8"></div>

        {{-- Ubah Kata Sandi Section --}}
        <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
            <i class="fas fa-lock text-indigo-600"></i> Ubah Kata Sandi
        </h3>

        {{-- Current Password --}}
        <div>
            <label class="block text-slate-700 text-sm font-semibold mb-2">Kata Sandi Saat Ini</label>
            <input type="password" name="current_password" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all">
            @error('current_password')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
            <p class="text-slate-500 text-xs mt-1">Wajib diisi jika ingin mengubah kata sandi</p>
        </div>

        {{-- Password Baru dan Konfirmasi (Side by Side) --}}
        <div class="grid grid-cols-2 gap-4">
            {{-- Password Baru --}}
            <div>
                <label class="block text-slate-700 text-sm font-semibold mb-2">Kata Sandi Baru</label>
                <input type="password" name="password" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all">
                @error('password')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
                <p class="text-slate-500 text-xs mt-1">Minimal 8 karakter</p>
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <label class="block text-slate-700 text-sm font-semibold mb-2">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all">
                @error('password_confirmation')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- Tombol Submit diubah menjadi type="button" agar memicu SweetAlert --}}
        <button type="button" onclick="confirmUpdate()" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-indigo-200 transition duration-300 transform active:scale-[0.98]">
            <i class="fas fa-save mr-2"></i> SIMPAN PERUBAHAN
        </button>
    </form>
</div>

{{-- Script Konfirmasi SweetAlert2 --}}
<script>
function confirmUpdate() {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda akan merubah informasi profil Anda.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#4f46e5', // Indigo 600
        cancelButtonColor: '#64748b',  // Slate 500
        confirmButtonText: 'Ya, rubah!',
        cancelButtonText: 'Batal',
        customClass: {
            popup: 'rounded-3xl',
            confirmButton: 'rounded-xl px-6 py-3',
            cancelButton: 'rounded-xl px-6 py-3'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Mengirim form berdasarkan ID
            document.getElementById('profile-form').submit();
        }
    })
}
</script>
@endsection