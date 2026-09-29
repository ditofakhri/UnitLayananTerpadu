<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    /**
     * Daftar kebutuhan / layanan ULT
     */
    public const KEBUTUHAN = [
        'ukbi'             => 'UKBI',
        'smara_muruhita'   => 'Smara Muruhita (Ahli Bahasa)',
        'landung'          => 'Landung (Layanan Gedung)',
        'prada'            => 'Prada (Perpustakaan Daring)',
        'gangsingan'       => 'Gangsingan (Magang dan Kunjungan)',
        'lajasa'           => 'Lajasa (Kerja Sama)',
        'lainnya'          => 'Lainnya...',
    ];

    /**
     * List data tamu
     */
    public function index()
    {
        $tamus = Tamu::orderByDesc('tanggal')->paginate(10);
        $kebutuhanMap = self::KEBUTUHAN;

        return view('tamu.index', compact('tamus', 'kebutuhanMap'));
    }

    /**
     * Form input tamu
     */
    public function create()
    {
        $kebutuhan = self::KEBUTUHAN;
        return view('tamu.create', compact('kebutuhan'));
    }

    /**
     * Simpan data tamu
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_tamu'  => 'required|string|max:120',
            'instansi'   => 'nullable|string|max:160',
            'no_hp'      => 'nullable|string|max:30',
            'kebutuhan'  => 'required|in:' . implode(',', array_keys(self::KEBUTUHAN)),
            'keterangan' => 'required|string|max:1000',
            'tanggal'    => 'required|date',
        ]);

        Tamu::create($validated);

        return redirect()
            ->route('tamu.index')
            ->with('ok', 'Data tamu berhasil disimpan.');
    }

    /**
     * Form edit tamu
     */
    public function edit(Tamu $tamu)
    {
        $kebutuhan = self::KEBUTUHAN;
        return view('tamu.edit', compact('tamu', 'kebutuhan'));
    }

    /**
     * Update data tamu
     */
    public function update(Request $request, Tamu $tamu)
    {
        $validated = $request->validate([
            'nama_tamu'  => 'required|string|max:120',
            'instansi'   => 'nullable|string|max:160',
            'no_hp'      => 'nullable|string|max:30',
            'kebutuhan'  => 'required|in:' . implode(',', array_keys(self::KEBUTUHAN)),
            'keterangan' => 'required|string|max:1000',
            'tanggal'    => 'required|date',
        ]);

        $tamu->update($validated);

        return redirect()
            ->route('tamu.index')
            ->with('ok', 'Data tamu berhasil diperbarui.');
    }

    /**
     * Hapus data tamu
     */
    public function destroy(Tamu $tamu)
    {
        $tamu->delete();

        return redirect()
            ->route('tamu.index')
            ->with('ok', 'Data tamu berhasil dihapus.');
    }
}
