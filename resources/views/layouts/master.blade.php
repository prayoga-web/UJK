<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris - EduSys Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-[#f8fafc] text-slate-700 font-sans">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-white border-r border-slate-200 hidden md:block">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-indigo-900 flex items-center gap-2">
                    <i class="fas fa-boxes text-indigo-600"></i> Inventaris
                </h1>
            </div>
            <nav class="mt-4 px-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-3 {{ Request::is('dashboard') ? 'bg-indigo-50 text-indigo-600 font-medium' : 'text-slate-500' }} rounded-lg transition">
                    <i class="fas fa-th-large w-5"></i> Dashboard
                </a>
                <a href="{{ route('items.index') }}" class="flex items-center gap-3 p-3 {{ Request::is('items*') ? 'bg-indigo-50 text-indigo-600 font-medium' : 'text-slate-500' }} rounded-lg transition">
                    <i class="fas fa-archive w-5"></i> Manajemen Barang 
                </a>
                <form action="{{ route('logout') }}" method="POST" class="pt-10">
                    @csrf
                    <button class="flex items-center gap-3 p-3 text-red-500 hover:bg-red-50 w-full rounded-lg transition">
                        <i class="fas fa-sign-out-alt w-5"></i> Logout
                    </button>
                </form>
            </nav>
        </aside>

        <main class="flex-1">
            <header class="bg-white border-b border-slate-200 p-4 flex justify-between items-center px-8">
                <h2 class="text-xl font-semibold text-slate-800">Manajemen Inventaris</h2>
                <div class="flex items-center gap-4">
                    <i class="fas fa-bell text-slate-400"></i>
                    <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center text-white text-xs">A</div>
                </div>
            </header>
            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    // Notifikasi Sukses
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000,
            customClass: {
                popup: 'rounded-3xl',
            }
        });
    @endif

    // Konfirmasi Hapus (Custom Function)
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444', // Warna merah seperti di gambar
            cancelButtonColor: '#64748b',  // Warna abu-abu
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            customClass: {
                popup: 'rounded-3xl',
                confirmButton: 'rounded-xl px-6 py-3',
                cancelButton: 'rounded-xl px-6 py-3'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
    </script>
</body>
</html>