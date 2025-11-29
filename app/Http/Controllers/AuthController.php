<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // Jika sudah login, langsung arahkan ke dashboard
            return redirect()->route('admin.dashboard');
        }

        // Jika belum login, tampilkan halaman login
        return view('login');
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Ambil data user yang login
            $user = Auth::user();

            // Arahkan sesuai role
            if ($user->role === 'superadmin') {
                return redirect()->route('admin.dashboard'); // kamu bisa ubah route-nya sesuai yang kamu punya
            } elseif ($user->role === 'admin') {
                return redirect()->route('admin.dashboard'); // atau buat route lain, misalnya 'admin.page'
            } else {
                Auth::logout();
                return redirect('/')->withErrors(['username' => 'Role tidak dikenali.']);
            }
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
