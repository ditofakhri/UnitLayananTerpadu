@extends('layouts.app')

@section('content')
<div class="bg-white border rounded-2xl p-5">
  <div class="text-xl font-bold mb-4">Input Log Harian Petugas Jaga</div>

  <form class="space-y-4" method="post" action="{{ route('log.store') }}" enctype="multipart/form-data">
    @csrf
    <div>
      <label class="text-sm font-semibold">Nama Petugas Jaga</label>
      <input name="nama_penjaga"
         class="mt-1 w-full rounded-xl border p-3"
         placeholder="Contoh: Fakhri"
         value="{{ old('nama_penjaga') }}">
    </div>

    <div>
      <label class="text-sm font-semibold">Aktivitas</label>
      <textarea name="aktivitas" rows="5" class="mt-1 w-full rounded-xl border p-3" placeholder="Tulis aktivitas harian...">{{ old('aktivitas') }}</textarea>
    </div>

    <div>
      <label class="text-sm font-semibold">Lampiran Dokumentasi (foto)</label>
      <input type="file" name="lampiran" accept="image/*" class="mt-1 w-full rounded-xl border p-3">
      <div class="text-xs text-slate-500 mt-1">JPG/PNG, max 5MB.</div>
    </div>

    <div class="flex gap-2">
      <button class="px-5 py-3 rounded-xl bg-slate-900 text-white">Simpan</button>
      <a class="px-5 py-3 rounded-xl bg-slate-100" href="{{ route('log.index') }}">Kembali</a>
    </div>
  </form>
</div>
@endsection
