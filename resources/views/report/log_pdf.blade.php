<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
    .title { font-size: 16px; font-weight: bold; margin-bottom: 6px; }
    table { width: 100%; border-collapse: collapse; }
    td, th { border: 1px solid #ddd; padding: 8px; vertical-align: top; }
    img { border-radius: 6px; }
  </style>
</head>
<body>
  <div class="title">Unit Layanan Terpadu (ULT) — Laporan Log Harian Petugas Jaga</div>
  <div>Periode: {{ $awal }} s/d {{ $akhir }}</div>
  <br>

  <table>
    <thead>
      <tr>
        <th style="width: 90px;">Tanggal</th>
        <th style="width: 120px;">Nama</th>
        <th>Aktivitas</th>
        <th style="width: 140px;">Dokumentasi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($logs as $log)
      <tr>
        <td>{{ \Carbon\Carbon::parse($log->tanggal)->format('d/m/Y') }}</td>
        <td>{{ $log->nama_penjaga }}</td>
        <td>{!! nl2br(e($log->aktivitas)) !!}</td>
        <td>
          @if($log->lampiran_path)
            <img src="{{ public_path($log->lampiran_path) }}" width="130">
          @else
            -
          @endif
        </td>
      </tr>
      @empty
      <tr><td colspan="4">Tidak ada data.</td></tr>
      @endforelse
    </tbody>
  </table>
</body>
</html>
