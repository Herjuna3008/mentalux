<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Untuk Raw Query / Query Builder
use Illuminate\Support\Facades\File; // Untuk cek/buat folder

class PsychologistController extends Controller
{
    // Tampilkan Form Upload
    public function showUploadForm()
    {
        // Ambil role user dan ubah ke huruf kecil untuk perbandingan yang konsisten
        $userRole = strtolower(Auth::user()->role);
        // Cek apakah role user adalah 'psychologist' ATAU 'admin'
        if ($userRole !== 'psychologist' && $userRole !== 'admin') {
            // Jika TIDAK ADA satupun yang cocok, lakukan redirect
            return redirect()->route('dashboard.customer')->with('status', 'Akses ditolak.')->with('type', 'error');
        }
        // Jika salah satu cocok, tampilkan view
        return view('psychologist_upload');
    }

    // Proses Upload (Pengganti if ($_SERVER['REQUEST_METHOD'] === 'POST'))
    public function handleUpload(Request $request)
    {
        // Validasi File (Max 10 MB, Tipe PDF)
        $request->validate([
            'certificate' => 'required|file|mimes:pdf|max:10240', // Max 10MB
        ], [
            'certificate.required' => '⚠️ Anda wajib memilih file untuk diupload.',
            'certificate.mimes' => '❌ Hanya file PDF yang diizinkan.',
            'certificate.max' => '⚠️ Ukuran file maksimal adalah 10 MB.',
        ]);

        $file = $request->file('certificate');
        $userId = Auth::id();
        $fileNameOriginal = $file->getClientOriginalName();

        // Buat nama unik: certificate_[user_id]_[timestamp].pdf
        $newFileName = 'certificate_' . $userId . '_' . time() . '.' . $file->extension();

        // Tentukan folder penyimpanan (public/uploads/certificates)
        $uploadPath = public_path('uploads/certificates');

        // Pastikan folder ada
        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0775, true, true);
        }

        // Simpan File ke Server
        try {
            $file->move($uploadPath, $newFileName);

            // Simpan data ke Database
            DB::insert('
                INSERT INTO psychologist_certificates (psychologist_id, certificate_name, certificate_path)
                VALUES (?, ?, ?)
            ', [$userId, $fileNameOriginal, $newFileName]);

            // Berhasil
            return back()->with('status', '✅ Sertifikat berhasil diupload.')->with('type', 'success');
        } catch (\Exception $e) {
            // Gagal
            return back()->with('status', '⚠️ Gagal menyimpan file ke server atau database.')->with('type', 'error');
        }
    }
}
