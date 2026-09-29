@extends('layouts.app')

@section('content')
<div class="space-y-6">

  {{-- ================= HEADER ================= --}}
  <div class="rounded-2xl p-6 bg-slate-900 text-white shadow">
    <h1 class="text-2xl font-bold tracking-tight">
      Selamat datang di ULT
    </h1>
    <p class="text-sm text-slate-300 mt-2">
      Sistem lokal untuk pencatatan log harian petugas jaga dan pendataan tamu, lengkap dengan laporan PDF (dokumentasi foto) dan Excel 
    </p>
  </div>

  {{-- ================= GRID ================= --}}
  <div class="grid md:grid-cols-3 gap-6">

    {{-- ================= AKSES CEPAT ================= --}}
    <div class="bg-white rounded-2xl p-5 border shadow-sm">
      <h2 class="font-semibold text-slate-800 mb-4">Akses Cepat</h2>

      <div class="space-y-3">
        <a href="{{ route('log.create') }}"
           class="flex items-center justify-between p-4 rounded-xl bg-blue-600 text-white hover:bg-blue-700 transition">
          <div>
            <div class="font-semibold">Input Log</div>
            <div class="text-xs opacity-90">Petugas Jaga</div>
          </div>
          <span class="text-xl">📝</span>
        </a>

        <a href="{{ route('tamu.create') }}"
           class="flex items-center justify-between p-4 rounded-xl bg-slate-100 hover:bg-slate-200 transition">
          <div>
            <div class="font-semibold text-slate-800">Form Tamu</div>
            <div class="text-xs text-slate-500">Pengunjung</div>
          </div>
          <span class="text-xl">👤</span>
        </a>

        <a href="{{ route('report.index') }}"
           class="flex items-center justify-between p-4 rounded-xl bg-slate-100 hover:bg-slate-200 transition">
          <div>
            <div class="font-semibold text-slate-800">Unduh Laporan</div>
            <div class="text-xs text-slate-500">PDF & Excel</div>
          </div>
          <span class="text-xl">📊</span>
        </a>
      </div>
    </div>

    {{-- ================= TUGAS ================= --}}
    <div class="md:col-span-2 bg-white rounded-2xl p-6 border shadow-sm">

      <div class="flex items-center justify-between mb-5">
        <h2 class="text-lg font-bold text-slate-800">
          Standar Tugas Petugas Jaga
        </h2>
        <span class="text-xs px-3 py-1 rounded-full bg-blue-100 text-blue-700">
          SOP ULT
        </span>
      </div>

      <div class="space-y-4">

        {{-- ITEM 1 --}}
        <div class="flex gap-4 p-4 rounded-xl border hover:bg-slate-50 transition">
          <div class="flex flex-col items-center">
            <span class="text-blue-600 font-bold text-lg">1</span>
            <span class="w-1 h-full bg-blue-600 rounded-full mt-1"></span>
          </div>
          <div>
            <h3 class="font-semibold">Pelayanan Pengunjung</h3>
            <p class="text-sm text-slate-600">
              Memberikan pelayanan prima kepada pengunjung atau pemohon layanan
              serta berkoordinasi dengan pihak internal terkait.
            </p>
          </div>
        </div>

        {{-- ITEM 2 --}}
        <div class="flex gap-4 p-4 rounded-xl border hover:bg-slate-50 transition">
          <div class="flex flex-col items-center">
            <span class="text-blue-600 font-bold text-lg">2</span>
            <span class="w-1 h-full bg-blue-600 rounded-full mt-1"></span>
          </div>
          <div>
            <h3 class="font-semibold">Pencatatan Log Harian</h3>
            <p class="text-sm text-slate-600">
              Mengisi log harian dan informasi pengunjung atau pemohon layanan
              pada aplikasi Log Harian ULT.
            </p>
          </div>
        </div>

        {{-- ITEM 3 --}}
        <div class="flex gap-4 p-4 rounded-xl border hover:bg-slate-50 transition">
          <div class="flex flex-col items-center">
            <span class="text-blue-600 font-bold text-lg">3</span>
            <span class="w-1 h-full bg-blue-600 rounded-full mt-1"></span>
          </div>
          <div>
            <h3 class="font-semibold">Layanan WhatsApp</h3>
            <p class="text-sm text-slate-600">
              Menjawab dan menindaklanjuti layanan ULT melalui WhatsApp.
            </p>
          </div>
        </div>

        {{-- ITEM 4 --}}
        <div class="flex gap-4 p-4 rounded-xl border hover:bg-slate-50 transition">
          <div class="flex flex-col items-center">
            <span class="text-blue-600 font-bold text-lg">4</span>
            <span class="w-1 h-full bg-blue-600 rounded-full mt-1"></span>
          </div>
          <div>
            <h3 class="font-semibold">Survei Kepuasan Masyarakat</h3>
            <p class="text-sm text-slate-600">
              Mengarahkan pengunjung mengisi SKM melalui QR Code.
            </p>
          </div>
        </div>

        {{-- ITEM 5 --}}
        <div class="flex gap-4 p-4 rounded-xl border hover:bg-slate-50 transition">
          <div class="flex flex-col items-center">
            <span class="text-blue-600 font-bold text-lg">5</span>
            <span class="w-1 h-full bg-blue-600 rounded-full mt-1"></span>
          </div>
          <div>
            <h3 class="font-semibold">Pemeliharaan Ruang ULT</h3>
            <p class="text-sm text-slate-600">
              Menjaga inventaris serta kebersihan dan kerapian ruang ULT.
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
