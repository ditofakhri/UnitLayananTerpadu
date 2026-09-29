<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LogPenjaga;
use App\Models\Tamu;
use Illuminate\Support\Str;

class DummyUltSeeder extends Seeder
{
    public function run(): void
    {
        // ===== Dummy Log Penjaga (20 data) =====
        $namaPenjaga = ['Dito', 'Faizal', 'Raka', 'Amel', 'Sari'];
        $aktivitas = [
            'Menjaga pintu depan dan mencatat tamu.',
            'Mengecek keamanan ruangan dan CCTV.',
            'Menerima paket dan mengarahkan tamu ke layanan terkait.',
            'Patroli area parkir dan memastikan ketertiban.',
            'Membantu koordinasi pengunjung dan pegawai.',
        ];

        for ($i = 0; $i < 20; $i++) {
            $tanggal = now()->subDays(rand(0, 30))->toDateString();

            LogPenjaga::create([
                'nama_penjaga' => $namaPenjaga[array_rand($namaPenjaga)],
                'tanggal' => $tanggal,               // tetap isi (NOT NULL)
                'waktu' => now()->subDays(rand(0, 30)), // audit / bisa dipakai
                'aktivitas' => $aktivitas[array_rand($aktivitas)],
                'lampiran_path' => null, // dummy tanpa foto dulu
            ]);
        }

        // ===== Dummy Form Tamu (25 data) =====
        $kebutuhan = [
            'ukbi',
            'smara',
            'landung',
            'prada',
            'gangsingan',
            'lajasa',
        ];

        $instansi = ['Sekolah', 'Kampus', 'Komunitas', 'Perusahaan', 'Umum'];

        for ($i = 0; $i < 25; $i++) {
            $tgl = now()->subDays(rand(0, 45))->toDateString();

            Tamu::create([
                'nama_tamu' => 'Tamu ' . Str::upper(Str::random(4)),
                'instansi' => $instansi[array_rand($instansi)],
                'no_hp' => '08' . rand(1111111111, 9999999999),
                'kebutuhan' => $kebutuhan[array_rand($kebutuhan)],
                'keterangan' => 'Konsultasi / tujuan dummy untuk pengujian sistem.',
                'tanggal' => $tgl,
            ]);
        }
    }
}
