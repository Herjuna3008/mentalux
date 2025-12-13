
// 1. Pop-up TERIMA (Hijau - Simpel)
function konfirmasiTerima(button, nama) {
    Swal.fire({
        title: 'Verifikasi Psikolog?',
        text: "Akun " + nama + " akan diaktifkan.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#198754',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Terima!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            button.closest('.form-approve').submit();
        }
    });
}

// 2. Pop-up TOLAK (Merah - Pakai Input Text)
function konfirmasiTolak(button, nama) {
    Swal.fire({
        title: 'Tolak Sertifikat?',
        text: "Masukkan alasan penolakan untuk " + nama + ":",
        icon: 'warning',
        input: 'textarea', // INI KUNCINYA: Munculin kotak teks
        inputPlaceholder: 'Contoh: bukan sertifikat yang sesuai',
        inputAttributes: {
            'aria-label': 'Tulis alasan penolakan'
        },
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Kirim Penolakan',
        cancelButtonText: 'Batal',
        inputValidator: (value) => {
            if (!value) {
                return 'Anda harus menuliskan alasannya!' // Wajib isi
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Ambil form pembungkus tombol
            let form = button.closest('.form-reject');

            // Bikin input rahasia buat nyelipin alasan yang baru diketik
            let inputReason = document.createElement("input");
            inputReason.setAttribute("type", "hidden");
            inputReason.setAttribute("name", "reason");
            inputReason.setAttribute("value", result.value); // Isi dengan teks admin

            // Masukin ke form dan kirim
            form.appendChild(inputReason);
            form.submit();
        }
    });
}
