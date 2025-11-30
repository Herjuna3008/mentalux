@php
    // Ambil variabel message yang mungkin dikirim dari Controller
    $message = session('status'); 
    $messageType = session('type'); // Success atau error
@endphp
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
    
    @include('navbar') <div class="container mt-5 pt-5">
        <div class="card shadow p-4 mx-auto" style="max-width: 600px;">
            <h3 class="mb-4 text-primary fw-bold">Upload Sertifikat</h3>

            {{-- Menampilkan pesan status --}}
            @if ($message)
                <div class="alert alert-{{ $messageType === 'success' ? 'success' : 'danger' }}">
                    {!! $message !!}
                </div>
            @endif

            <form action="{{ route('psychologist.upload.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="certificate" class="form-label">Silakan upload file sertifikat Anda (PDF, max 10 MB):</label>
                    <input type="file" name="certificate" id="certificate" class="form-control" required>
                    @error('certificate')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100">Upload Sertifikat</button>
            </form>

            <hr>

            <a href="{{ route('dashboard.psychologist') }}" class="btn btn-secondary w-100">
                <i class="fas fa-arrow-left me-2"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

</body>
</html>