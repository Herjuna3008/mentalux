<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // =========================================
    // 1. LOGIC LOGIN (FIXED ROLE CHECK)
    // ==========================================
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Ambil role dari user yang login
            $role = Auth::user()->role; 
            
            // KONVERSI KE HURUF KECIL BIAR GAK SALAH BACA
            // Contoh: "Admin" jadi "admin", "Psychologist" jadi "psychologist"
            $checkRole = strtolower($role); 
            
            if ($checkRole === 'admin') {
                return redirect()->route('dashboard.admin');
            } elseif ($checkRole === 'psychologist') {
                return redirect()->route('dashboard.psychologist');
            }

            // Default ke Customer
            return redirect()->route('dashboard.customer');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah bro, coba lagi.',
        ])->onlyInput('email');
    }

    // ==========================================
    // 2. LOGIC DAFTAR
    // ==========================================
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'], 
            'password' => ['required', 'min:6'], 
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer', // Default role pas daftar
        ]);

        Auth::login($user);

        return redirect()->route('dashboard.customer');
    }

    // ==========================================
    // 3. LOGIC LOGOUT
    // ==========================================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        return redirect()->route('login');
    }
}