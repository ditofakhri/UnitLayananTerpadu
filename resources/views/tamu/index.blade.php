@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-4">
  <div>
    <div class="text-2xl font-bold">Form Tamu</div>
    <div class="text-slate-500 text-sm">Daftar kunjungan tamu dan kebutuhan informasi.</div>
  </div>
  <a href="{{ route('tamu.create') }}"
     class="px-4 py-3 rounded-xl bg-blue-600 text-white hover:opacity-90">
    + Input Tamu
  </a>
</div>

<div class="bg-white border rounded-2xl overflow-hidden">
  <div class="overflow-x-auto">
    <table class="min-w-full text-sm">
      <thead class="bg-slate-50 text-slate-600">
        <tr>
          <th class="text-left p-3 w-[120px]">Tanggal</th>
          <th class="text-left p-3 w-[180px]">Nama Tamu</th>
          <th class="text-left p-3 w-[200px]">Instansi</th>
          <th class="text-left p-3 w-[140px]">No HP</th>
          <th class="text-left p-3 w-[260px]">Kebutuhan</th>
          <th class="text-left p-3 w-[260px]">Keterangan</th>
          <th class="text-left p-3 w-[160px]">Aksi</th>
        </tr>
      </thead>

      <tbody class="divide-y">
        @forelse($tamus as $t)
          <tr class="align-top">
            <td class="p-3 whitespace-nowrap">{{ \Carbon\Carbon::parse($t->tanggal)->format('d/m/Y') }} </td>
            <td class="p-3 font-medium">{{ $t->nama_tamu }}</td>
            <td class="p-3">{{ $t->instansi ?? '-' }}</td>
            <td class="p-3">{{ $t->no_hp ?? '-' }}</td>
            <td class="p-3">
              <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs border">
                {{ $kebutuhanMap[$t->kebutuhan] ?? $t->kebutuhan }}
              </span>
            </td>
            <td class="p-3">
              <div class="whitespace-pre-line">{{ $t->keterangan }}</div>
            </td>
            <td class="p-3">
  <div class="flex gap-2">
    <a href="{{ route('tamu.edit', $t) }}"
       class="px-3 py-2 rounded-lg bg-slate-100 hover:bg-slate-200">
      Edit
    </a>

    <form method="post" action="{{ route('tamu.destroy', $t) }}"
          onsubmit="return confirm('Yakin ingin menghapus data tamu ini?')">
      @csrf
      @method('DELETE')
      <button class="px-3 py-2 rounded-lg bg-red-600 text-white hover:opacity-90">
        Hapus
      </button>
    </form>
  </div>
</td>
          </tr>
        @empty
          <tr>
          <td colspan="7" class="p-4 text-slate-500">Belum ada data tamu.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="p-4">
    {{ $tamus->links() }}
  </div>
</div>
@endsection
