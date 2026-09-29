@extends('layouts.app')

@section('content')
<div class="bg-white border rounded-2xl p-5">
  <div class="text-xl font-bold mb-4">Input Form Tamu</div>

  <form class="space-y-4" method="post" action="{{ route('tamu.store') }}">
    @csrf

    <div class="grid md:grid-cols-2 gap-4">
      <div>
        <label class="text-sm font-semibold">Nama Tamu</label>
        <input name="nama_tamu" class="mt-1 w-full rounded-xl border p-3" value="{{ old('nama_tamu') }}">
      </div>
      <div>
        <label class="text-sm font-semibold">Tanggal</label>
        <input type="date" name="tanggal" class="mt-1 w-full rounded-xl border p-3" value="{{ old('tanggal', date('Y-m-d')) }}">
      </div>
    </div>

    <div class="grid md:grid-cols-2 gap-4">
      <div>
        <label class="text-sm font-semibold">Pekerjaan / Instansi</label>
        <input name="instansi" class="mt-1 w-full rounded-xl border p-3" value="{{ old('instansi') }}">
      </div>
      <div>
        <label class="text-sm font-semibold">No Telepon / HP</label>
        <input name="no_hp" class="mt-1 w-full rounded-xl border p-3" value="{{ old('no_hp') }}">
      </div>
    </div>

    <div>
  <label class="text-sm font-semibold">Informasi yang dibutuhkan</label>
  <select id="kebutuhan"
          name="kebutuhan"
          class="mt-1 w-full rounded-xl border p-3"
          required>
    <option value="" disabled selected>-- Pilih layanan / unit --</option>

    @foreach($kebutuhan as $key => $label)
      <option value="{{ $key }}" @selected(old('kebutuhan') === $key)>
        {{ $label }}
      </option>
    @endforeach
  </select>
</div>


    <div>
      <label class="text-sm font-semibold">Tujuan / Keterangan</label>
      <textarea name="keterangan" rows="3"
            class="mt-1 w-full rounded-xl border p-3"
            placeholder="Contoh: Konsultasi UKBI, permohonan kerja sama, kunjungan perpustakaan, dll."
            required>{{ old('keterangan') }}</textarea>
    </div>


    <div class="flex gap-2">
      <button class="px-5 py-3 rounded-xl bg-blue-600 text-white">Simpan</button>
      <a class="px-5 py-3 rounded-xl bg-slate-100" href="{{ route('tamu.index') }}">Kembali</a>
    </div>
  </form>
</div>

<script>
  const kebutuhan = document.getElementById('kebutuhan');
  const wrap = document.getElementById('keteranganWrap');

  function toggleKet() {
    wrap.classList.toggle('hidden', kebutuhan.value !== 'keterangan');
  }
  kebutuhan.addEventListener('change', toggleKet);
  toggleKet();
</script>
@endsection
