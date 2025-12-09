<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Menampilkan Form
    public function index()
    {
        return view('signup');
    }

    // Proses Data
    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'username' => 'required|min:3',
            'email'    => 'required|email|unique:account,email',
            'password' => 'required|min:8|confirmed', // Pastikan input konfirmasi name-nya: password_confirmation
            'role'     => 'nullable|string'
        ]);

        // Simpan ke Database
        User::create([
            'username' => $validated['username'],
            'email'    => $validated['email'],
            'password' => $validated['password'], // Otomatis di-hash
            'role'     => $request->role ?? 'CUSTOMER', // Default CUSTOMER
        ]);

        // Redirect (sesuaikan mau dilempar kemana, contoh ke login)
        return redirect('/signup')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}