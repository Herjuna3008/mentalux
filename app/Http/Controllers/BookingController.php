<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{   

    public function show($psikolog_name)
    {
        // Data Jam
        $timeSlots = [
            "10.00 - 12.00 WIB",
            "13.00 - 15.00 WIB",
            "16.00 - 18.00 WIB",
            "19.00 - 21.00 WIB",
        ];

        // urldecode buat ngilangin %20 dari URL
        $name = urldecode($psikolog_name);

        return view('booking', compact('name', 'timeSlots'));
    }

    public function store(Request $request)
    {
        // Validasi
        $data = $request->validate([
            'psikolog_name' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
        ]);

        $data['price'] = 'Rp 200.000';

        return redirect('/payment')->with('bookingData', $data);
    }


    public function payment()
    {
        // Ambil data dari session
        $booking = session('bookingData');

        if (!$booking) {
            return redirect('/');
        }

        return view('payment', compact('booking'));
    }

    public function chat(Request $request)
{
    //ambil nama dokter dari URL (?doctor=...)
    $doctorName = $request->query('doctor');

    if (!$doctorName) {
        $booking = session('bookingData');
        $doctorName = $booking['psikolog_name'] ?? null;
    }

    //Kalau kosong, baru pake Default
    if (!$doctorName) {
        $doctorName = 'Dr. Dicky Oktrianda'; 
    }

    // Bersihkan format URL
    $doctorName = urldecode($doctorName);

    return view('chat', compact('doctorName'));
}
}
