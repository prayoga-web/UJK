<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * AuthController - Menangani autentikasi pengguna
 * 
 * Controller ini bertanggung jawab untuk:
 * - Menampilkan form login
 * - Memproses login pengguna
 * - Menangani logout pengguna
 */
class AuthController extends Controller
{
    /**
     * Tampilkan halaman login
     * 
     * @return \Illuminate\View\View
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses login pengguna dengan validasi email dan password
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validasi input email dan password
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba login dengan kredensial yang diberikan
        if (Auth::attempt($credentials)) {
            // Regenerate session untuk keamanan
            $request->session()->regenerate();
            // Redirect ke dashboard atau halaman yang diminta sebelumnya
            return redirect()->intended('/dashboard');
        }

        // Jika login gagal, kembalikan ke halaman login dengan error message
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    /**
     * Logout pengguna dan invalidate session
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Logout pengguna yang sedang login
        Auth::logout();
        // Invalidate session untuk menghapus data login
        $request->session()->invalidate();
        // Generate token CSRF yang baru untuk keamanan
        $request->session()->regenerateToken();
        // Redirect ke halaman login
        return redirect('/login');
    }
}