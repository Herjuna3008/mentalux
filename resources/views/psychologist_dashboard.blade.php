@php
// DATA DUMMY JADWAL (Sementara, sebelum ditarik dari database)
$appointments = [
['client' => 'Anton Santoso', 'time' => '10:00 AM', 'date' => 'Today', 'status' => 'Confirmed'],
['client' => 'Siti Aminah', 'time' => '02:00 PM', 'date' => 'Today', 'status' => 'Pending'],
['client' => 'Andi Pratama', 'time' => '09:00 AM', 'date' => 'Tomorrow', 'status' => 'Confirmed'],
];
@endphp

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
                    <h2 class="fw-bold mb-0">Dr. {{ auth()->user()->username }}</h2>
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
        <div class="row g-4">

            <div class="col-lg-8">
                <h4 class="fw-bold mb-4">Upcoming Appointments</h4>

                @foreach($appointments as $apt)
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
                            <button class="btn btn-primary btn-sm rounded-pill px-3">Join Call</button>
                            <button class="btn btn-outline-secondary btn-sm rounded-circle"><i class="fas fa-file-medical"></i></button>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="col-lg-4">
                <h4 class="fw-bold mb-4">Quick Menu</h4>
                <div class="list-group shadow-sm rounded-3 border-0">
                    <a href="#" class="list-group-item list-group-item-action py-3 border-0">
                        <i class="fas fa-user-clock me-2 text-primary"></i> Availability Settings
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3 border-0">
                        <i class="fas fa-history me-2 text-success"></i> Consultation History
                    </a>

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
</body>

</html>