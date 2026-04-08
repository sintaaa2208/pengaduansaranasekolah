<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Siswa;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aspirasis = Aspirasi::with(['siswa', 'kategori'])->paginate(10);
        return view('aspirasi.index', compact('aspirasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswas = Siswa::all();
        $kategoris = Kategori::all();
        return view('aspirasi.create', compact('siswas', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelaporan' => 'required|integer|unique:aspirasis',
            'nis' => 'required|integer',
            'id_kategori' => 'required|integer',
            'lokasi' => 'required|string|max:50',
            'ket' => 'required|string|max:50',
        ]);

        Aspirasi::create($validated);

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aspirasi $aspirasi)
    {
        $aspirasi->load(['siswa', 'kategori']);
        return view('aspirasi.show', compact('aspirasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aspirasi $aspirasi)
    {
        $siswas = Siswa::all();
        $kategoris = Kategori::all();
        $statuses = Aspirasi::getStatuses();
        return view('aspirasi.edit', compact('aspirasi', 'siswas', 'kategoris', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aspirasi $aspirasi)
    {
        $validated = $request->validate([
            'id_pelaporan' => 'required|integer|unique:aspirasis,id_pelaporan,' . $aspirasi->id_aspirasi . ',id_aspirasi',
            'nis' => 'required|integer',
            'id_kategori' => 'required|integer',
            'lokasi' => 'required|string|max:50',
            'ket' => 'required|string|max:50',
            'status' => 'required|in:Menunggu,Proses,Selesai',
            'feedback' => 'nullable|string|max:255',
        ]);

        $aspirasi->update($validated);

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aspirasi $aspirasi)
    {
        $aspirasi->delete();
        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi berhasil dihapus');
    }

    /**
     * Update status aspirasi
     */
    public function updateStatus(Request $request, Aspirasi $aspirasi)
    {
        $validated = $request->validate([
            'status' => 'required|in:Menunggu,Proses,Selesai',
        ]);

        $aspirasi->update($validated);

        return redirect()->back()->with('success', 'Status aspirasi berhasil diperbarui');
    }
}
