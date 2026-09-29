@extends('layouts.app')

@section('content')
<div class="bg-white border rounded-2xl p-5">
  <div class="flex items-start justify-between gap-4 mb-4">
    <div>
      <div class="text-xl font-bold">Edit Log Harian Petugas Jaga</div>
      <div class="text-sm text-slate-500">
        Tanggal log: <span class="font-semibold">
          {{ \Carbon\Carbon::parse($log->tanggal)->format('d/m/Y') }}
        </span>
      </div>
      <div class="text-xs text-slate-400 mt-1">
        Terakhir diubah: {{ $log->updated_at?->format('d/m/Y H:i') }}
      </div>
    </div>

    <a href="{{ route('log.index') }}" class="px-4 py-3 rounded-xl bg-slate-100 hover:bg-slate-200">
      Kembali
    </a>
  </div>

  <form class="space-y-4" method="post" action="{{ route('log.update', $log) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
      <label class="text-sm font-semibold">Nama Petugas Jaga</label>
      <input name="nama_penjaga"
             class="mt-1 w-full rounded-xl border p-3"
             value="{{ old('nama_penjaga', $log->nama_penjaga) }}">
    </div>

    <div>
      <label class="text-sm font-semibold">Aktivitas</label>
      <textarea name="aktivitas" rows="5"
                class="mt-1 w-full rounded-xl border p-3">{{ old('aktivitas', $log->aktivitas) }}</textarea>
    </div>

    <div>
      <label class="text-sm font-semibold">Dokumentasi (foto)</label>
      <div class="grid md:grid-cols-2 gap-4 mt-2">
        <div class="rounded-xl border p-3">
          <div class="text-xs text-slate-500 mb-2">Foto saat ini</div>
          @if($log->lampiran_path)
            <img class="w-full h-44 object-cover rounded-xl border"
            src="{{ asset($log->lampiran_path) }}" alt="Dokumentasi">
          @else
            <div class="text-slate-400">Tidak ada foto.</div>
          @endif
        </div>

        <div>
          <div class="text-xs text-slate-500 mb-2">Upload foto baru (opsional)</div>
          <input type="file" name="lampiran" accept="image/*" class="w-full rounded-xl border p-3">
          <div class="text-xs text-slate-500 mt-2">JPG/PNG, max 5MB.</div>
        </div>
      </div>
    </div>

    <div class="flex gap-2">
      <button class="px-5 py-3 rounded-xl bg-slate-900 text-white">Simpan Perubahan</button>
      <a class="px-5 py-3 rounded-xl bg-slate-100" href="{{ route('log.index') }}">Batal</a>
    </div>
  </form>
</div>
@endsection
