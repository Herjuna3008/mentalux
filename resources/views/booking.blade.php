<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Jadwal - MentalUX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
    <link rel="icon" href="{{ asset('/logo.png') }}" type="image/x-icon">
    

</head>
<body>

    @include('navbar') 

    <div class="container mb-5">
        <div class="booking-card">
            
            <div class="text-center mb-4">
                <h5 class="text-muted small">Pilih Jam Konsultasi</h5>
                <h3 class="fw-bold text-primary">{{ $name }}</h3>
            </div>

            <form action="{{ route('booking.store') }}" method="POST">
                @csrf <input type="hidden" name="psikolog_name" value="{{ $name }}">

                <div class="mb-4">
                    <label class="fw-bold mb-2 ps-2">Pilih Tanggal</label>
                    <input type="date" name="tanggal" class="form-control p-3 rounded-4 bg-light border-0 fw-bold" required>
                </div>

                <div class="d-flex flex-column gap-3">
                    @foreach($timeSlots as $key => $slot)
                        <div class="w-100">
                            <input type="radio" class="btn-check" name="jam" id="time_{{ $key }}" value="{{ $slot }}" required>
                            
                            <label class="time-label" for="time_{{ $key }}">
                                {{ $slot }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-continue shadow">
                    Lanjutkan
                </button>
            </form>

        </div>
    </div>

    @include('footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/script.js"></script>
</body>
</html>