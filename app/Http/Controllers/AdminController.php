<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psychologist; // Model Psikolog
use App\Models\User;         // Model User
// use App\Models\Booking;   // Kalau nanti mau hitung booking, buka ini
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // 1. Hitung Total Psikolog (Real dari Database)
        // Ini bakal ngehasilin angka 9 sesuai data lu
        $totalPsychologists = Psychologist::count();

        // 2. Hitung Total User
        // Kalau tabel user lu masih error/kosong, dia bakal return 0 (aman, gak error)
        try {
            $totalUsers = User::count();
        } catch (\Exception $e) {
            $totalUsers = 0; // Fallback kalau tabel user bermasalah
        }

        // 3. Hitung Total Sesi (Dummy dulu kalau belum ada tabel booking)
        // $totalSessions = Booking::count(); 
        $totalSessions = 150; // Angka pura-pura dulu

        // Kirim semua variabel ke View 'admin_dashboard'
        return view('admin_dashboard', compact('totalPsychologists', 'totalUsers', 'totalSessions'));
    }

    public function verifications()
    {
        // Ambil data sertifikat join sama data user (biar tau siapa yg upload)
        $certificates = DB::table('psychologist_certificates')
            ->join('account', 'psychologist_certificates.psychologist_id', '=', 'account.id')
            ->select('psychologist_certificates.*', 'account.username as psychologist_name', 'account.email')
            ->orderBy('uploaded_at', 'desc')
            ->get();

        return view('admin_verification', compact('certificates'));
    }

    // 2. Proses Approve
    public function approve($id)
    {
        DB::table('psychologist_certificates')
            ->where('id', $id)
            ->update(['status' => 'approved', 'reject_reason' => null]);

        return back()->with('success', 'Sertifikat berhasil disetujui! Psikolog sekarang terverifikasi.');
    }

    // 3. Proses Reject
    public function reject(Request $request, $id)
    {
        $reason = $request->input('reason'); 

        if (!$reason) {
            $reason = 'Dokumen tidak memenuhi syarat verifikasi.';
        }

        // 3. Simpan ke Database
        DB::table('psychologist_certificates')
            ->where('id', $id)
            ->update([
                'status' => 'rejected',
                'reject_reason' => $reason
            ]);

        return back()->with('success', 'Sertifikat ditolak dengan alasan: ' . $reason);
    }
}