<?php

namespace App\Http\Controllers;

use App\Models\LogPenjaga;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LogPenjagaController extends Controller
{
    public function index()
    {
        $logs = LogPenjaga::orderByDesc('tanggal')->paginate(10);
        return view('log.index', compact('logs'));
    }

    public function create()
    {
        return view('log.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penjaga' => 'required|string|max:120',
            'aktivitas' => 'required|string',
            'lampiran' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $path = null;

if ($request->hasFile('lampiran')) {
    $file = $request->file('lampiran');

    $namaFile = time().'_'.$file->getClientOriginalName();
    $folder = 'uploads/log-penjaga/' . date('Y/m');

    $file->move(public_path($folder), $namaFile);

    $path = $folder . '/' . $namaFile;
}

        LogPenjaga::create([
            'nama_penjaga' => $request->nama_penjaga,
            'tanggal' => now()->toDateString(),     // ✅ otomatis YYYY-MM-DD
            'aktivitas' => $request->aktivitas,
            'lampiran_path' => $path,
            'waktu' => now(),                       // ✅ otomatis tanggal+jam
          ]);
          
          

        return redirect()->route('log.index')->with('ok', 'Log harian berhasil disimpan.');
    }

    public function edit(LogPenjaga $log)
{
    return view('log.edit', compact('log'));
}

public function update(Request $request, LogPenjaga $log)
{
    $validated = $request->validate([
        'nama_penjaga' => 'required|string|max:120',
        'aktivitas' => 'required|string',
        'lampiran' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
    ]);

    // Jika upload foto baru, hapus foto lama (opsional tapi rapi)
    if ($request->hasFile('lampiran')) {
        $file = $request->file('lampiran');
    
        // pastikan folder ada
        $folder = 'uploads/log-penjaga/' . date('Y/m');
        $fullPath = public_path($folder);
    
        if (!file_exists($fullPath)) {
            mkdir($fullPath, 0777, true);
        }
    
        $namaFile = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
    
        $file->move($fullPath, $namaFile);
    
        $validated['lampiran_path'] = $folder . '/' . $namaFile;
    }
    

    // PENTING: jangan ubah tanggal (biar tetap tanggal awal)
    // $log->tanggal tetap

    $log->update($validated); // updated_at otomatis terisi "waktu edit"

    return redirect()->route('log.index')->with('ok', 'Log harian berhasil diperbarui.');
}

    public function getTanggalFormattedAttribute()
    {
    return Carbon::parse($this->tanggal)->format('d/m/Y');
    }
}