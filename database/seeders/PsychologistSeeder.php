<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PsychologistSeeder extends Seeder
{
    public function run()
    {
        // Hapus data lama biar gak dobel kalau dijalankan ulang
        DB::table('psychologists')->truncate();

        $psychologists = [
            [
                "name" => "Dr. Dicky Oktrianda",
                "role" => "Dokter Jiwa (Psychiatrist)",
                "specialist" => "Medical Psychiatry",
                "image" => "img/psikolog/drDicky.png",
                "desc" => "Seorang dokter yang memfokuskan keahliannya pada bidang kesehatan jiwa dan penanganan kondisi psikis secara medis.",
                "session" => "2 Hours",
                "price" => "Rp 200.000",
                "created_at" => now(), "updated_at" => now()
            ],
            [
                "name" => "Amanda Angela S.Psi, M.Psi",
                "role" => "Psikolog Klinis",
                "specialist" => "Adult & Trauma",
                "image" => "img/psikolog/drAmanda.png",
                "desc" => "Psikolog alumnus Universitas Surabaya (2013) dan Unpad (2018), berpengalaman menangani trauma mendalam.",
                "session" => "2 Hours",
                "price" => "Rp 200.000",
                "created_at" => now(), "updated_at" => now()
            ],
            [
                "name" => "Patricia Elfira Finny S.Psi",
                "role" => "Psikolog Klinis",
                "specialist" => "General Mental Health",
                "image" => "img/psikolog/drPatricia.png",
                "desc" => "Berpengalaman 9 tahun memberikan layanan konsultasi terkait kesehatan mental dan pengembangan diri.",
                "session" => "2 Hours",
                "price" => "Rp 200.000",
                "created_at" => now(), "updated_at" => now()
            ],
            [
                "name" => "Mila Rahmawati M.Psi",
                "role" => "Psikolog Klinis Dewasa",
                "specialist" => "Family & Marriage",
                "image" => "img/psikolog/drMila.jpg",
                "desc" => "Berpengalaman 13 tahun menangani masalah rumah tangga, pasangan, dan kecemasan pada orang dewasa.",
                "session" => "2 Hours",
                "price" => "Rp 200.000",
                "created_at" => now(), "updated_at" => now()
            ],
            [
                "name" => "Munazilah S.Psi, M.Psi",
                "role" => "Psikolog Klinis",
                "specialist" => "Self Development",
                "image" => "img/psikolog/drMunazilah.jpg",
                "desc" => "Memiliki pengalaman 6 tahun membantu individu menemukan potensi terbaik dan mengatasi hambatan mental.",
                "session" => "2 Hours",
                "price" => "Rp 200.000",
                "created_at" => now(), "updated_at" => now()
            ],
            [
                "name" => "Ayu Hidayati M.Psi",
                "role" => "Psikolog Klinis",
                "specialist" => "Stress & Burnout",
                "image" => "img/psikolog/drAyu.jpg",
                "desc" => "Ahli dalam manajemen stres pekerjaan, burnout, dan keseimbangan hidup (work-life balance).",
                "session" => "2 Hours",
                "price" => "Rp 200.000",
                "created_at" => now(), "updated_at" => now()
            ],
            [
                "name" => "Bayu Prasetya Yudha S.Psi",
                "role" => "Psikolog Klinis",
                "specialist" => "Men's Mental Health",
                "image" => "img/psikolog/drBayu.png",
                "desc" => "Psikolog yang fokus membantu pria dan dewasa muda dalam mengelola emosi dan tekanan sosial.",
                "session" => "2 Hours",
                "price" => "Rp 200.000",
                "created_at" => now(), "updated_at" => now()
            ],
            [
                "name" => "Dharma Novriansyah, M.Psi",
                "role" => "Psikolog Klinis",
                "specialist" => "Behavioral Therapy",
                "image" => "img/psikolog/drDharma.png",
                "desc" => "Memberikan layanan konseling dengan pendekatan praktis dan terapi perilaku kognitif (CBT).",
                "session" => "2 Hours",
                "price" => "Rp 200.000",
                "created_at" => now(), "updated_at" => now()
            ],
            [
                "name" => "Giavanny P. M.Psi",
                "role" => "Psikolog Anak & Remaja",
                "specialist" => "Child & Teen",
                "image" => "img/psikolog/drGiavanny.png",
                "desc" => "Memiliki pemahaman mendalam pada proses tumbuh kembang anak dan masalah emosi remaja.",
                "session" => "2 Hours",
                "price" => "Rp 200.000",
                "created_at" => now(), "updated_at" => now()
            ],
        ];

        DB::table('psychologists')->insert($psychologists);
    }
}