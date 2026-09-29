<?php

namespace App\Http\Controllers;

use App\Models\LogPenjaga;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    /**
     * PDF Log Penjaga
     */
    public function logPdf(Request $request)
{
    // Antisipasi data agak besar
    ini_set('memory_limit', '512M');
    set_time_limit(300);

    $data = $request->validate([
        'awal'  => 'required|date',
        'akhir' => 'required|date|after_or_equal:awal',
    ]);

    $awal  = \Carbon\Carbon::parse($data['awal'])->startOfDay();
    $akhir = \Carbon\Carbon::parse($data['akhir'])->endOfDay();

    // Maksimal 31 hari (1 bulan)
    if ($awal->diffInDays($akhir) > 31) {
        return back()->with('error', 'Maksimal export PDF adalah 1 bulan (31 hari)');
    }

    $logs = LogPenjaga::whereBetween('tanggal', [$awal, $akhir])
        ->orderBy('tanggal')
        ->get();

    // Kalau data terlalu banyak
    if ($logs->count() > 1500) {
        return back()->with('error', 'Data terlalu banyak untuk PDF. Gunakan export Excel.');
    }

    // 🔴 CEK GD EXTENSION
    if (!extension_loaded('gd')) {
        // Fallback ke Excel
        $sheet = new Spreadsheet();
        $ws = $sheet->getActiveSheet();
        $ws->setTitle('Log Penjaga');

        $ws->fromArray([
            ['Tanggal', 'Nama Petugas', 'Keterangan']
        ], null, 'A1');

        $i = 2;
        foreach ($logs as $r) {
            $ws->fromArray([[
                \Carbon\Carbon::parse($r->tanggal)->format('d/m/Y'),
                $r->nama_petugas ?? '-',
                $r->keterangan ?? '-',
            ]], null, "A{$i}");
            $i++;
        }

        foreach (range('A', 'C') as $col) {
            $ws->getColumnDimension($col)->setAutoSize(true);
        }

        $filename = "ULT-Log-Penjaga-{$awal->format('Y-m-d')}-{$akhir->format('Y-m-d')}.xlsx";
        $tempPath = storage_path("app/{$filename}");

        (new Xlsx($sheet))->save($tempPath);

        return response()
            ->download($tempPath)
            ->deleteFileAfterSend(true);
    }

    // ✅ Kalau GD aktif → PDF langsung download
    $pdf = Pdf::loadView('report.log_pdf', [
        'logs'  => $logs,
        'awal'  => $awal->format('Y-m-d'),
        'akhir' => $akhir->format('Y-m-d'),
    ])->setPaper('A4', 'portrait');

    return $pdf->download(
        "ULT-Log-Penjaga-{$awal->format('Y-m-d')}-{$akhir->format('Y-m-d')}.pdf"
    );
}
    /**
     * Excel Form Tamu
     */
    public function tamuExcel(Request $request)
    {
        $data = $request->validate([
            'awal'  => 'required|date',
            'akhir' => 'required|date|after_or_equal:awal',
        ]);

        $rows = Tamu::whereBetween('tanggal', [$data['awal'], $data['akhir']])
            ->orderBy('tanggal')
            ->get();

        $sheet = new Spreadsheet();
        $ws = $sheet->getActiveSheet();
        $ws->setTitle('Form Tamu');

        // Header
        $ws->fromArray([
            ['Tanggal', 'Nama Tamu', 'Instansi', 'No HP', 'Kebutuhan', 'Keterangan']
        ], null, 'A1');

        // Mapping kebutuhan (SINGLE SOURCE OF TRUTH)
        $kebutuhanMap = \App\Http\Controllers\TamuController::KEBUTUHAN;

        $i = 2;
        foreach ($rows as $r) {
            $labelKebutuhan = $kebutuhanMap[$r->kebutuhan]
                ?? strtoupper($r->kebutuhan); // fallback aman

            $ws->fromArray([[
                Carbon::parse($r->tanggal)->format('d/m/Y'),
                $r->nama_tamu,
                $r->instansi,
                $r->no_hp,
                $labelKebutuhan,
                $r->keterangan,
            ]], null, "A{$i}");

            $i++;
        }

        // Auto size kolom
        foreach (range('A', 'F') as $col) {
            $ws->getColumnDimension($col)->setAutoSize(true);
        }

        $filename = "ULT-Form-Tamu-{$data['awal']}-{$data['akhir']}.xlsx";
        $tempPath = storage_path("app/{$filename}");

        (new Xlsx($sheet))->save($tempPath);

        return response()
            ->download($tempPath)
            ->deleteFileAfterSend(true);
    }
}
