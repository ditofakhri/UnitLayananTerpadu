@extends('layouts.app')

@section('content')
<div class="bg-white border rounded-2xl p-5">
  <div class="flex items-start justify-between gap-4 mb-4">
    <div>
      <div class="text-xl font-bold">Edit Form Tamu</div>
      <div class="text-xs text-slate-400 mt-1">
        Terakhir diubah: {{ $tamu->updated_at?->format('d/m/Y H:i') }}
      </div>
    </div>

    <a href="{{ route('tamu.index') }}" class="px-4 py-3 rounded-xl bg-slate-100 hover:bg-slate-200">
      Kembali
    </a>
  </div>

  <form class="space-y-4" method="post" action="{{ route('tamu.update', $tamu) }}">
    @csrf
    @method('PUT')

    <div class="grid md:grid-cols-2 gap-4">
      <div>
        <label class="text-sm font-semibold">Nama Tamu</label>
        <input name="nama_tamu" class="mt-1 w-full rounded-xl border p-3"
               value="{{ old('nama_tamu', $tamu->nama_tamu) }}">
      </div>
      <div>
        <label class="text-sm font-semibold">Tanggal</label>
        <input type="date" name="tanggal" class="mt-1 w-full rounded-xl border p-3"
               value="{{ old('tanggal', $tamu->tanggal) }}">
      </div>
    </div>

    <div class="grid md:grid-cols-2 gap-4">
      <div>
        <label class="text-sm font-semibold">Pekerjaan / Instansi</label>
        <input name="instansi" class="mt-1 w-full rounded-xl border p-3"
               value="{{ old('instansi', $tamu->instansi) }}">
      </div>
      <div>
        <label class="text-sm font-semibold">No Telepon / HP</label>
        <input name="no_hp" class="mt-1 w-full rounded-xl border p-3"
               value="{{ old('no_hp', $tamu->no_hp) }}">
      </div>
    </div>

    <div>
      <label class="text-sm font-semibold">Layanan / Unit yang dituju</label>
      <select name="kebutuhan" class="mt-1 w-full rounded-xl border p-3" required>
        @foreach($kebutuhan as $key => $label)
          <option value="{{ $key }}" @selected(old('kebutuhan', $tamu->kebutuhan) === $key)>{{ $label }}</option>
        @endforeach
      </select>
    </div>

    <div>
      <label class="text-sm font-semibold">Tujuan / Keterangan</label>
      <textarea name="keterangan" rows="3" class="mt-1 w-full rounded-xl border p-3"
        required>{{ old('keterangan', $tamu->keterangan) }}</textarea>
    </div>

    <div class="flex gap-2">
      <button class="px-5 py-3 rounded-xl bg-blue-600 text-white">Simpan Perubahan</button>
      <a class="px-5 py-3 rounded-xl bg-slate-100" href="{{ route('tamu.index') }}">Batal</a>
    </div>
  </form>
</div>
@endsection
