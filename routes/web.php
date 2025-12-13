<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PsychologistController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// 1. HALAMAN PUBLIK (Bisa diakses siapa aja)
// ==========================================

// Home Page
Route::view('/', 'index')->name('home');

// About Us
Route::view('/about', 'about')->name('about');

// Education
Route::view('/education', 'education')->name('education');

// List Psikolog (PENTING: Ini pake Controller biar Database & Search jalan)
Route::get('/psychologist', [PsychologistController::class, 'index'])->name('psychologist.index');

// Detail Artikel (Sementara)
Route::get('/article', function () {
    return view('article_detail');
})->name('article.detail');


// ==========================================
// 2. HALAMAN OTENTIKASI (Login/Register)
// ==========================================

// Login
Route::view('/login', 'login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Sign Up (Pake RegisterController sesuai baris bawah file lu tadi)
Route::get('/signup', [RegisterController::class, 'index'])->name('signup');
Route::post('/signup', [RegisterController::class, 'store'])->name('signup.store');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Lupa Password
Route::view('/forgot-password', 'forgotpass')->name('password.request');


// ==========================================
// 3. HALAMAN DASHBOARD & PRIVATE (Wajib Login)
// ==========================================

Route::middleware(['auth'])->group(function () {
    
    // --- DASHBOARD ---
    // Dashboard Customer (Pake DashboardController)
    Route::get('/dashboard/customer', [DashboardController::class, 'customer'])->name('dashboard.customer');

    // Dashboard Admin (Pake AdminController - Biar angkanya Real Time)
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('dashboard.admin');

    // Dashboard Psikolog (Pake DashboardController)
    Route::get('/dashboard/psychologist', [DashboardController::class, 'psychologist'])->name('dashboard.psychologist');

    // --- FITUR PSIKOLOG (UPLOAD SERTIFIKAT) ---
    // (Digabung disini biar aman harus login dulu)
    Route::get('/dashboard/psychologist/upload', [PsychologistController::class, 'showUploadForm'])->name('psychologist.upload');
    Route::post('/dashboard/psychologist/upload', [PsychologistController::class, 'handleUpload'])->name('psychologist.upload.post');
    Route::delete('/dashboard/psychologist/upload/delete', [PsychologistController::class, 'deleteCertificate'])->name('psychologist.upload.delete');

    // --- BOOKING SYSTEM ---
    // Route ini yang bikin error "Route not defined" kalau ga dikasih nama
    Route::get('/booking/{psikolog}', [BookingController::class, 'show'])->name('booking.show'); 
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

    // --- PAYMENT ---
    Route::get('/payment', [BookingController::class, 'payment']); // Pastikan method payment ada di Controller

    // --- CHAT ---
    Route::get('/chat', [BookingController::class, 'chat'])->name('chat');

    // Halaman List Verifikasi
    Route::get('/dashboard/admin/verifications', [AdminController::class, 'verifications'])->name('admin.verifications');

    // Action Tombol
    Route::post('/dashboard/admin/verifications/{id}/approve', [AdminController::class, 'approve'])->name('admin.approve');
    Route::post('/dashboard/admin/verifications/{id}/reject', [AdminController::class, 'reject'])->name('admin.reject');
});