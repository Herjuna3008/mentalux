<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // Dashboard Customer
    public function customer()
    {
        // Nanti bisa ditambah logic ambil history booking user disini
        return view('customer_dashboard');
    }

    // Dashboard Psikolog
    public function psychologist()
    {
    // Ambil data user yang login
    $user = Auth::user();

    // DATA DUMMY JADWAL (Nanti bisa diganti query database: Booking::where(...)->get())
    $appointments = [
        ['client' => 'Anton Santoso', 'time' => '10:00 AM', 'date' => 'Today', 'status' => 'Confirmed'],
        ['client' => 'Siti Aminah', 'time' => '02:00 PM', 'date' => 'Today', 'status' => 'Pending'],
        ['client' => 'Andi Pratama', 'time' => '09:00 AM', 'date' => 'Tomorrow', 'status' => 'Confirmed'],
    ];

    $verification = DB::table('psychologist_certificates')
        ->where('psychologist_id', $user->id)
        ->orderBy('uploaded_at', 'desc') // Ambil yang paling baru
        ->first();

    // Kirim data ke View
    return view('psychologist_dashboard', compact('user', 'appointments', 'verification'));
    }
}