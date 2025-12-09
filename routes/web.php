<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PsychologistController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ini adalah tempat mendaftarkan semua link halaman website kamu.
|
*/

// ==========================================
// 1. HALAMAN PUBLIK (Bisa diakses siapa aja)
// ==========================================

// Home Page (index.blade.php) -> Diakses via localhost:8000/
Route::view('/', 'index')->name('home');

// About Us (about.blade.php) -> localhost:8000/about
Route::view('/about', 'about')->name('about');

// Education (education.blade.php) -> localhost:8000/education
Route::view('/education', 'education')->name('education');

// List Psikolog (psychologist.blade.php) -> localhost:8000/psychologist
Route::view('/psychologist', 'psychologist')->name('psychologist');

// Detail Artikel (article_detail.blade.php)
// Note: Nanti perlu logic buat nangkep ID, sementara kita arahkan ke view aja dulu
Route::get('/article', function () {
    return view('article_detail');
})->name('article.detail');


// ==========================================
// 2. HALAMAN OTENTIKASI (Login/Register)
// ==========================================

// Halaman Login (login.blade.php)
Route::view('/login', 'login')->name('login');

// Halaman Sign Up (signup.blade.php)
Route::view('/signup', 'signup')->name('signup');

// Lupa Password (forgotpass.blade.php)
Route::view('/forgot-password', 'forgotpass')->name('password.request');


// ==========================================
// 3. DASHBOARD (Halaman setelah login)
// ==========================================

// Dashboard Customer
Route::view('/dashboard/customer', 'customer_dashboard')->name('dashboard.customer');

// Dashboard Admin
Route::view('/dashboard/admin', 'admin_dashboard')->name('dashboard.admin');

// Dashboard Psikolog
Route::view('/dashboard/psychologist', 'psychologist_dashboard')->name('dashboard.psychologist');

// Upload Psikolog (psychologist_upload.blade.php)
Route::view('/dashboard/psychologist/upload', 'psychologist_upload')->name('psychologist.upload');

// Proses Login (POST)
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Proses Daftar (POST)
Route::post('/signup', [AuthController::class, 'register'])->name('register.process');

// Proses Logout (GET atau POST bisa, aman GET dulu)
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// [Route GET] Menampilkan form upload
Route::get('/dashboard/psychologist/upload', [PsychologistController::class, 'showUploadForm'])
    ->middleware(['auth']) // Tambahkan middleware auth
    ->name('psychologist.upload');

// [Route POST] Memproses submit file
Route::post('/dashboard/psychologist/upload', [PsychologistController::class, 'handleUpload'])
    ->middleware(['auth']) // Tambahkan middleware auth
    ->name('psychologist.upload.post');

Route::get('/booking/{psikolog}', [BookingController::class, 'show']);
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

// Route untuk menampilkan halaman Payment QRIS
Route::get('/payment', [BookingController::class, 'payment']);

Route::get('/chat', [BookingController::class, 'chat'])->name('chat');

Route::get('/signup', [RegisterController::class, 'index'])->name('signup');
Route::post('/signup', [RegisterController::class, 'store'])->name('signup.store');