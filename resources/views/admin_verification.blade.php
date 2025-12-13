<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - MentalUX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/verification.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('/logo.png') }}" type="image/x-icon">
</head>
<body class="bg-light">
    @include('navbar')

    <div class="container py-5 mt-5">
        <h2 class="fw-bold mb-4">Verifikasi Sertifikat Psikolog</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Psikolog</th>
                            <th>File Sertifikat</th>
                            <th>Tanggal Upload</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($certificates as $cert)
                        <tr>
                            <td>
                                <div class="fw-bold">{{ $cert->psychologist_name }}</div>
                                <small class="text-muted">{{ $cert->email }}</small>
                            </td>
                            <td>
                                <a href="{{ asset('uploads/certificates/' . $cert->certificate_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-file-pdf me-1"></i> Lihat PDF
                                </a>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($cert->uploaded_at)->format('d M Y') }}</td>
                            <td>
                                @if($cert->status == 'approved')
                                    <span class="badge bg-success">Verified</span>
                                @elseif($cert->status == 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                            <td>
                                @if($cert->status == 'pending')
                                    <form action="{{ route('admin.approve', $cert->id) }}" method="POST" class="d-inline form-approve">
                                        @csrf
                                        <button type="button" class="btn btn-success btn-sm" onclick="konfirmasiTerima(this, '{{ $cert->psychologist_name }}')">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.reject', $cert->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-sm" onclick="konfirmasiTolak(this, '{{ $cert->psychologist_name }}')"><i class="fas fa-times"></i></button>
                                    </form>
                                @else
                                    <span class="text-muted small">Selesai</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('dashboard.admin') }}" class="btn btn-secondary">&laquo; Kembali ke Dashboard</a>
        </div>
    </div>

    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/script.js"></script>
</body>
</html>