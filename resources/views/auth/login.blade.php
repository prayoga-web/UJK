<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EduSys Inventaris</title>
    {{-- Tailwind CSS dari CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Font Awesome Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-[#f8fafc] flex items-center justify-center min-h-screen font-sans">
    {{-- Main Login Container --}}
    <div class="w-full max-w-md px-6">
        {{-- Header Section dengan Logo dan Judul --}}
        <div class="text-center mb-8">
            {{-- Logo Icon --}}
            <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-600 rounded-2xl shadow-lg shadow-indigo-200 mb-4">
                <i class="fas fa-boxes text-white text-2xl"></i>
            </div>
            {{-- Judul Aplikasi --}}
            <h2 class="text-3xl font-extrabold text-indigo-900 tracking-tight">EduSys <span class="text-indigo-600">Inventaris</span></h2>
            {{-- Subtitle --}}
            <p class="text-slate-500 mt-2 text-sm">Silakan masuk untuk mengelola stok barang.</p>
        </div>

        {{-- Login Form Card --}}
        <div class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100">
            {{-- Form Element --}}
            <form action="{{ url('/login') }}" method="POST" class="space-y-6">
                @csrf
                
                {{-- Input Email --}}
                <div>
                    <label class="block text-slate-700 text-sm font-semibold mb-2">Alamat Email</label>
                    <div class="relative">
                        {{-- Icon Email --}}
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" name="email" 
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-12 pr-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all" 
                               placeholder="admin@test.com" required>
                    </div>
                </div>

                {{-- Input Password --}}
                <div>
                    <div class="flex justify-between mb-2">
                        <label class="text-slate-700 text-sm font-semibold">Password</label>
                        {{-- Forgot Password Link --}}
                        <a href="#" class="text-xs text-indigo-600 hover:underline">Lupa Password?</a>
                    </div>
                    <div class="relative">
                        {{-- Icon Lock --}}
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password" 
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-12 pr-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all" 
                               placeholder="••••••••" required>
                    </div>
                </div>

                {{-- Remember Device Checkbox --}}
                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="w-4 h-4 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500">
                    <label for="remember" class="ml-2 text-sm text-slate-500">Ingat perangkat ini</label>
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-indigo-200 transition duration-300 transform active:scale-[0.98]">
                    MASUK KE SISTEM
                </button>
            </form>

            {{-- Error Message Display --}}
            @if($errors->any())
            <div class="mt-6 p-4 bg-red-50 border border-red-100 rounded-xl flex items-center gap-3 text-red-600 text-sm">
                <i class="fas fa-exclamation-circle"></i>
                <p>{{ $errors->first() }}</p>
            </div>
            @endif
        </div>

        {{-- Footer Copyright --}}
        <p class="text-center text-slate-400 text-xs mt-8">
            &copy; 2026 EduSys Management System. All rights reserved.
        </p>
    </div>

</body>
</html>