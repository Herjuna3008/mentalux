<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment QRIS - MentalUX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
    <link rel="icon" href="{{ asset('/logo.png') }}" type="image/x-icon">

</head>
<body>

    @include('navbar') 

    <div class="main-content-wrapper">
        <div class="container">
            
            <div class="text-center mb-4">
                <h4 class="fw-bold text-secondary">PAYMENT GATEWAY</h4>
            </div>

            <div class="payment-card">
                
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <small class="opacity-75">Order ID: #TRX-9981</small>
                    <div class="timer-badge">
                        <i class="far fa-clock me-1"></i> <span id="countdown">15:00</span>
                    </div>
                </div>

                <div class="nav-pills-custom">
                    <button class="nav-link-custom active" id="tab-qris" onclick="switchTab('qris')">QRIS</button>
                    <button class="nav-link-custom" id="tab-bank" onclick="switchTab('bank')">Transfer Bank</button>
                </div>

                <p class="text-center small mb-3 opacity-75" id="instruction-text">Scan QR Code di bawah ini</p>

                <div id="content-qris" class="white-area shadow-sm">
                    <div class="d-flex justify-content-between align-items-center qris-header">
                        <h6 class="fw-bold m-0">QRIS</h6>
                        <span class="badge bg-danger">GPN</span>
                    </div>

                    <h5 class="fw-bold m-0">MENTALUX APP</h5>
                    <p class="small text-muted mb-0">NMID: ID123456789</p>

                    <img src="{{ asset('img/qris/Qris.png') }}" class="qr-img" alt="QRIS">

                    <p class="fw-bold m-0">A01</p>
                </div>

                <div id="content-bank" class="white-area shadow-sm d-none d-flex flex-column justify-content-center">
                    <div class="text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" class="bank-logo" alt="BCA">
                        <p class="text-muted small mb-1">Bank Central Asia (BCA)</p>
                        <h6 class="fw-bold mb-3">PT MENTALUX SEHAT JIWA</h6>
                        
                        <div class="bg-light p-3 rounded-3 mb-3">
                            <small class="d-block text-muted mb-1">Nomor Rekening</small>
                            <span class="rek-number" id="rekText">2530375202</span>
                            <button class="btn btn-sm btn-outline-primary ms-2 rounded-circle" onclick="copyRek()" title="Salin"><i class="far fa-copy"></i></button>
                        </div>

                        <div class="alert alert-info py-2 small m-0 text-start">
                            <i class="fas fa-info-circle me-1"></i> Masukkan <strong>Order ID</strong> di berita transfer.
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <span class="d-block small opacity-75 mb-1">Total Pembayaran</span>
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        <h3 class="fw-bold m-0" id="priceText">{{ $booking['price'] ?? 'Rp 200.000' }}</h3>
                        <button class="btn-copy" onclick="copyPrice()" title="Salin Nominal"><i class="far fa-copy"></i></button>
                    </div>
                </div>

                <a href="#" class="btn-confirm shadow-sm">
                    Cek Status Pembayaran
                </a>

                <a href="{{ url('/chat') }}?doctor={{ urlencode($booking['psikolog_name'] ?? 'Psikolog') }}" class="btn-confirm shadow-sm">
                    Lanjutkan
                </a>
            </div>
            
            <p class="text-center text-muted small mt-4">
                <i class="fas fa-lock me-1"></i> Transaksi Aman & Terenkripsi
            </p>

        </div>
    </div>

    <script>
        // --- 1. LOGIKA GANTI TAB (INI YANG BIKIN PINDAH) ---
        function switchTab(tab) {
            // Ambil elemen
            const btnQris = document.getElementById('tab-qris');
            const btnBank = document.getElementById('tab-bank');
            const contentQris = document.getElementById('content-qris');
            const contentBank = document.getElementById('content-bank');
            const textInst = document.getElementById('instruction-text');

            if(tab === 'qris') {
                // Aktifkan tombol QRIS
                btnQris.classList.add('active');
                btnBank.classList.remove('active');
                
                // Munculkan konten QRIS, Sembunyikan Bank
                contentQris.classList.remove('d-none');
                contentBank.classList.add('d-none');
                
                textInst.innerText = "Scan QR Code di bawah ini";
            } else {
                // Aktifkan tombol Bank
                btnBank.classList.add('active');
                btnQris.classList.remove('active');

                // Munculkan konten Bank, Sembunyikan QRIS
                contentBank.classList.remove('d-none');
                contentQris.classList.add('d-none');

                textInst.innerText = "Lakukan transfer ke rekening berikut";
            }
        }

        // --- 2. TIMER ---
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
                display.textContent = minutes + ":" + seconds;
                if (--timer < 0) timer = 0;
            }, 1000);
        }
        window.onload = function () {
            var display = document.querySelector('#countdown');
            if(display) startTimer(60 * 15, display);
        };

        // --- 3. COPY FUNCTION ---
        function copyPrice() {
            var copyText = document.getElementById("priceText").innerText;
            navigator.clipboard.writeText(copyText).then(() => alert("Nominal disalin!"));
        }
        function copyRek() {
            var copyText = document.getElementById("rekText").innerText.replace(/\s/g, ''); // Hapus spasi
            navigator.clipboard.writeText(copyText).then(() => alert("No Rekening disalin!"));
        }
    </script>
    
    @include('footer')  

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/script.js"></script>
</body>
</html>
