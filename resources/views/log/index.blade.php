@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-4">
  <div>
    <div class="text-2xl font-bold">Log Harian Petugas Jaga</div>
    <div class="text-slate-500 text-sm">Daftar pencatatan log harian beserta dokumentasi.</div>
  </div>
  <a href="{{ route('log.create') }}"
     class="px-4 py-3 rounded-xl bg-slate-900 text-white hover:opacity-90">
    + Input Log
  </a>
</div>

<div class="bg-white border rounded-2xl overflow-hidden">
  <div class="overflow-x-auto">
    <table class="min-w-full text-sm">
      <thead class="bg-slate-50 text-slate-600">
        <tr>
          <th class="text-left p-3 w-[120px]">Tanggal</th>
          <th class="text-left p-3 w-[160px]">Nama Petugas Jaga</th>
          <th class="text-left p-3">Aktivitas</th>
          <th class="text-left p-3 w-[160px]">Dokumentasi</th>
          <th class="text-left p-3 w-[90px]">Aksi</th>
        </tr>
      </thead>

      <tbody class="divide-y">
        @forelse($logs as $log)
          <tr class="align-top">
            <td class="p-3 whitespace-nowrap">
            {{ \Carbon\Carbon::parse($log->tanggal)->format('d/m/Y') }}
            </td>
            <td class="p-3">{{ $log->nama_penjaga }}</td>
            <td class="p-3">
              <div class="line-clamp-3 whitespace-pre-line">{{ $log->aktivitas }}</div>
            </td>
            <td class="p-3">
              @if($log->lampiran_path)
                <a href="{{ asset($log->lampiran_path) }}" target="_blank" class="block">
                  <img class="rounded-xl border w-[140px] h-[90px] object-cover"
                       src="{{ asset($log->lampiran_path) }}" alt="Dokumentasi">
                </a>
              @else
                <span class="text-slate-400">Tidak ada</span>
              @endif
            </td>
            <td class="p-3">
                <a href="{{ route('log.edit', $log) }}"
                class="inline-flex items-center px-3 py-2 rounded-lg bg-slate-100 hover:bg-slate-200">
                 Edit
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="p-4 text-slate-500">Belum ada data log.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="p-4">
    {{ $logs->links() }}
  </div>
</div>
@endsection
