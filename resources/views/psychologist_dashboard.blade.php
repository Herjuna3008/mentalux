<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psychologist Dashboard - MentalUX</title>
    <link rel="icon" href="{{ asset('/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    @include('navbar')

    <section class="bg-primary text-white py-5 mt-5">
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="bg-white text-primary rounded-circle me-3 d-flex align-items-center justify-content-center shadow" style="width: 80px; height: 80px; font-size: 2rem;">
                    <i class="fas fa-user-md"></i>
                </div>
                <div>
                    <h2 class="fw-bold mb-0">
                        Dr. {{ auth()->user()->name ?? auth()->user()->username }}
                        @if(isset($verification) && $verification->status == 'approved')
                            <i class="fas fa-check-circle text-warning ms-2" title="Verified Psychologist" style="font-size: 1.2rem;"></i>
                        @endif
                    </h2>
                    <p class="mb-0 opacity-75">Clinical Psychologist</p>
                </div>

                <div class="ms-auto text-end">
                    <h4 class="fw-bold mb-0">Rp 4.500.000</h4>
                    <small>Earnings this month</small>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">
        
        <div class="mb-4">
            @if(isset($verification))
                @if($verification->status == 'pending')
                    <div class="alert alert-warning border-0 shadow-sm d-flex align-items-center">
                        <div class="fs-1 me-3"><i class="fas fa-clock"></i></div>
                        <div>
                            <strong>Dokumen Sedang Ditinjau</strong><br>
                            Tim admin kami sedang memverifikasi sertifikat Anda. Fitur konsultasi akan aktif setelah disetujui.
                        </div>
                    </div>
                @elseif($verification->status == 'rejected')
                    <div class="alert alert-danger border-0 shadow-sm d-flex align-items-center">
                        <div class="fs-1 me-3"><i class="fas fa-times-circle"></i></div>
                        <div>
                            <strong>Verifikasi Ditolak</strong><br>
                            Maaf, dokumen Anda ditolak. Alasan: {{ $verification->reject_reason ?? 'Dokumen tidak valid' }}.<br>
                            Silakan <a href="{{ route('psychologist.upload') }}" class="fw-bold text-danger text-decoration-underline">Upload Ulang</a>.
                        </div>
                    </div>
                @endif
            @else
                <div class="alert alert-info border-0 shadow-sm d-flex align-items-center">
                    <div class="fs-1 me-3"><i class="fas fa-info-circle"></i></div>
                    <div>
                        <strong>Akun Belum Terverifikasi</strong><br>
                        Silakan upload sertifikat praktek Anda agar profil Anda muncul di pencarian user.
                        <a href="{{ route('psychologist.upload') }}" class="fw-bold text-primary text-decoration-underline ms-1">Upload Sekarang</a>
                    </div>
                </div>
            @endif
        </div>
        <div class="row g-4">

            <div class="col-lg-8">
                <h4 class="fw-bold mb-4">Upcoming Appointments</h4>

                @forelse($appointments as $apt)
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="bg-light p-3 rounded-3 text-center me-3" style="min-width: 80px;">
                                <small class="d-block text-muted">{{ $apt['date'] }}</small>
                                <strong class="text-primary">{{ $apt['time'] }}</strong>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">{{ $apt['client'] }}</h5>
                                <span class="badge {{ $apt['status'] == 'Confirmed' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ $apt['status'] }}
                                </span>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-sm rounded-pill px-3">Join Chat</button>
                            <button class="btn btn-outline-secondary btn-sm rounded-circle"><i class="fas fa-file-medical"></i></button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-light border text-center text-muted py-4">
                    <i class="fas fa-calendar-times fa-2x mb-2"></i><br>
                    Belum ada jadwal konsultasi.
                </div>
                @endforelse

            </div>

            <div class="col-lg-4">
                <h4 class="fw-bold mb-4">Quick Menu</h4>
                <div class="list-group shadow-sm rounded-3 border-0">
                    <a href="{{ route('psychologist.upload') }}" class="list-group-item list-group-item-action py-3 border-0">
                        <i class="fas fa-certificate me-2 text-warning"></i> Upload Sertifikat
                    </a>

                    <a href="{{ route('logout') }}" class="list-group-item list-group-item-action py-3 border-0 text-danger fw-bold">
                        <i class="fas fa-sign-out-alt me-2"></i> Log Out
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>