<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Upload Sertifikat Psikolog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon">
</head>

<body class="bg-light">

    @include('navbar')

    <div class="container mt-5 pt-5">
        <div class="card shadow p-4 mx-auto" style="max-width: 700px;">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="text-primary fw-bold mb-0">Manajemen Sertifikat</h3>
                <a href="{{ route('dashboard.psychologist') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

            {{-- 1. BAGIAN ALERT / NOTIFIKASI --}}
            @if (session('status'))
                <div class="alert alert-{{ session('type') == 'success' ? 'success' : 'danger' }} alert-dismissible fade show">
                    {!! session('status') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- 2. LOGIC UTAMA: CEK APAKAH UDAH ADA SERTIFIKAT? --}}
            @if($certificate)
                
                {{-- KONDISI A: SUDAH ADA FILE (TAMPILKAN INFO & TOMBOL DELETE) --}}
                <div class="text-center py-4">
                    <div class="mb-3 text-danger">
                        <i class="fas fa-file-pdf fa-5x"></i>
                    </div>
                    
                    <h5 class="fw-bold">{{ $certificate->certificate_name }}</h5>
                    <p class="text-muted small">
                        Diupload: {{ \Carbon\Carbon::parse($certificate->uploaded_at)->format('d M Y, H:i') }}
                    </p>

                    {{-- Badge Status --}}
                    <div class="mb-4">
                        @if($certificate->status == 'approved')
                            <span class="badge bg-success px-3 py-2 rounded-pill fs-6">
                                <i class="fas fa-check-circle me-1"></i> Terverifikasi
                            </span>
                        @elseif($certificate->status == 'rejected')
                            <span class="badge bg-danger px-3 py-2 rounded-pill fs-6">
                                <i class="fas fa-times-circle me-1"></i> Ditolak
                            </span>
                            <div class="mt-2 text-danger small bg-danger bg-opacity-10 p-2 rounded">
                                <strong>Alasan:</strong> {{ $certificate->reject_reason }}
                            </div>
                        @else
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fs-6">
                                <i class="fas fa-clock me-1"></i> Menunggu Verifikasi
                            </span>
                        @endif
                    </div>

                    <hr>

                    {{-- Tombol Aksi --}}
                    <div class="d-flex justify-content-center gap-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fas fa-edit me-2"></i> Ganti File
                        </button>

                        <form action="{{ route('psychologist.upload.delete') }}" method="POST" onsubmit="return confirm('Yakin hapus sertifikat? Verifikasi akan hilang.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fas fa-trash-alt me-2"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>

            @else

                {{-- KONDISI B: BELUM ADA FILE (TAMPILKAN FORM UPLOAD BIASA) --}}
                <div class="text-center mb-4">
                    <p class="text-muted">Belum ada sertifikat yang diupload. Silakan upload sertifikat anda!</p>
                </div>

                <form action="{{ route('psychologist.upload.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="certificate" class="form-label fw-bold">Pilih File (PDF, max 10 MB):</label>
                        <input type="file" name="certificate" id="certificate" class="form-control" required accept=".pdf">
                        @error('certificate')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        <i class="fas fa-upload me-2"></i> Upload Sertifikat
                    </button>
                </form>

            @endif

        </div>
    </div>

    {{-- 3. MODAL POPUP (KHUSUS UNTUK GANTI FILE) --}}
    @if($certificate)
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ganti Sertifikat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('psychologist.upload.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="alert alert-warning small">
                            <i class="fas fa-exclamation-triangle me-1"></i> 
                            Mengganti file akan mereset status menjadi <strong>Pending</strong>.
                        </div>
                        <div class="mb-3">
                            <label class="form-label">File Baru (PDF)</label>
                            <input type="file" name="certificate" class="form-control" required accept=".pdf">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>