<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;   // Untuk Query Builder / Raw
use Illuminate\Support\Facades\File; // Untuk File Handling
use App\Models\Psychologist;

class PsychologistController extends Controller
{
    // ==========================================================
    // 1. BAGIAN PUBLIC (Bisa diakses siapa saja)
    // ==========================================================
    
    public function index(Request $request)
    {
        // Ambil kata kunci pencarian dari URL (?cari=...)
        $keyword = $request->input('cari');

        // Logic Pencarian
        if ($keyword) {
            $psychologists = Psychologist::where('name', 'LIKE', "%$keyword%")
                            ->orWhere('specialist', 'LIKE', "%$keyword%")
                            ->orWhere('role', 'LIKE', "%$keyword%")
                            ->get();
        } else {
            // Kalau gak nyari, ambil semua data dari database
            $psychologists = Psychologist::all();
        }

        // Kirim data ke View 'psychologist.blade.php'
        // Pastikan nama view-nya sesuai dengan file kamu (misal: psychologist.blade.php)
        return view('psychologist', compact('psychologists', 'keyword'));
    }


    // ==========================================================
    // 2. BAGIAN PRIVATE (Khusus Psikolog Login)
    // ==========================================================

    // Tampilkan Form Upload
    // Tambahin ini di method showUploadForm
    public function showUploadForm()
    {
        $userRole = strtolower(Auth::user()->role);
        if ($userRole !== 'psychologist' && $userRole !== 'admin') {
            return redirect()->route('dashboard.customer');
        }

        // CEK APAKAH UDAH PERNAH UPLOAD
        $certificate = DB::table('psychologist_certificates')
            ->where('psychologist_id', Auth::id())
            ->first();

        // Kirim data sertifikat ke view (bisa null kalau belum ada)
        return view('psychologist_upload', compact('certificate'));
    }

    // Update method handleUpload (Otomatis Ganti File kalau udah ada)
    public function handleUpload(Request $request)
    {
        $request->validate([
            'certificate' => 'required|file|mimes:pdf|max:10240',
        ]);

        $file = $request->file('certificate');
        $userId = Auth::id();
        $fileNameOriginal = $file->getClientOriginalName();
        $newFileName = 'certificate_' . $userId . '_' . time() . '.' . $file->extension();
        $uploadPath = public_path('uploads/certificates');

        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0775, true, true);
        }

        // CEK DATA LAMA
        $existingCert = DB::table('psychologist_certificates')->where('psychologist_id', $userId)->first();

        try {
            // Pindahkan file BARU
            $file->move($uploadPath, $newFileName);

            if ($existingCert) {
                // --- SKENARIO UPDATE (GANTI FILE) ---
                
                // 1. Hapus file LAMA dari folder (biar gak nyampah)
                $oldFile = public_path('uploads/certificates/' . $existingCert->certificate_path);
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }

                // 2. Update Database (Reset status jadi pending lagi)
                DB::table('psychologist_certificates')
                    ->where('psychologist_id', $userId)
                    ->update([
                        'certificate_name' => $fileNameOriginal,
                        'certificate_path' => $newFileName,
                        'uploaded_at' => now(), // Update waktu upload
                        'status' => 'pending',  // Reset verifikasi
                        'reject_reason' => null // Hapus alasan tolak
                    ]);
                
                $msg = '✅ Sertifikat berhasil diperbarui! Mohon tunggu verifikasi ulang.';

            } else {
                // --- SKENARIO INSERT BARU ---
                DB::insert('
                    INSERT INTO psychologist_certificates (psychologist_id, certificate_name, certificate_path, status, uploaded_at)
                    VALUES (?, ?, ?, ?, ?)
                ', [$userId, $fileNameOriginal, $newFileName, 'pending', now()]);

                $msg = '✅ Sertifikat berhasil diupload.';
            }

            return back()->with('status', $msg)->with('type', 'success');

        } catch (\Exception $e) {
            return back()->with('status', '⚠️ Gagal menyimpan file.')->with('type', 'error');
        }
    }

    // TAMBAHAN: Method Delete
    public function deleteCertificate()
    {
        $userId = Auth::id();
        $cert = DB::table('psychologist_certificates')->where('psychologist_id', $userId)->first();

        if ($cert) {
            // 1. Hapus Fisik File
            $filePath = public_path('uploads/certificates/' . $cert->certificate_path);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            // 2. Hapus Data Database
            DB::table('psychologist_certificates')->where('psychologist_id', $userId)->delete();

            return back()->with('status', '🗑️ Sertifikat berhasil dihapus.')->with('type', 'success');
        }

        return back()->with('status', 'Data tidak ditemukan.')->with('type', 'error');
    }
}