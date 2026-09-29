@extends('layouts.app')

@section('content')
<div class="grid md:grid-cols-2 gap-4">
  <div class="bg-white border rounded-2xl p-5">
    <div class="text-xl font-bold mb-2">Report Log Petugas Jaga (PDF + Foto)</div>
    <form method="post" action="{{ route('report.log.pdf') }}" class="space-y-3">
      @csrf
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="text-sm font-semibold">Awal</label>
          <input type="date" name="awal" class="mt-1 w-full rounded-xl border p-3" value="{{ date('Y-m-01') }}">
        </div>
        <div>
          <label class="text-sm font-semibold">Akhir</label>
          <input type="date" name="akhir" class="mt-1 w-full rounded-xl border p-3" value="{{ date('Y-m-t') }}">
        </div>
      </div>
      <button class="px-5 py-3 rounded-xl bg-slate-900 text-white w-full">Download PDF</button>
    </form>
  </div>

  <div class="bg-white border rounded-2xl p-5">
    <div class="text-xl font-bold mb-2">Report Form Tamu (Excel)</div>
    <form method="post" action="{{ route('report.tamu.excel') }}" class="space-y-3">
      @csrf
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="text-sm font-semibold">Awal</label>
          <input type="date" name="awal" class="mt-1 w-full rounded-xl border p-3" value="{{ date('Y-m-01') }}">
        </div>
        <div>
          <label class="text-sm font-semibold">Akhir</label>
          <input type="date" name="akhir" class="mt-1 w-full rounded-xl border p-3" value="{{ date('Y-m-t') }}">
        </div>
      </div>
      <button class="px-5 py-3 rounded-xl bg-blue-600 text-white w-full">Download Excel</button>
    </form>
  </div>
</div>
@endsection
