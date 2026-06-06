<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index(Request $request)
{
    $query = Barang::where('user_id', Auth::id());
    
    // Search functionality
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('nama_barang', 'LIKE', "%{$search}%")
              ->orWhere('kode_barang', 'LIKE', "%{$search}%")
              ->orWhere('kategori', 'LIKE', "%{$search}%");
        });
    }
    
    // Filter by kategori
    if ($request->has('kategori') && $request->kategori != '') {
        $query->where('kategori', $request->kategori);
    }
    
    // Filter by kondisi
    if ($request->has('kondisi') && $request->kondisi != '') {
        $query->where('kondisi', $request->kondisi);
    }
    
    $barangs = $query->latest()->paginate(10);
    
    return view('barangs.index', compact('barangs'));
}

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:100',
            'kode_barang' => 'required|string|unique:barang,kode_barang|max:50',
            'kategori' => 'required|in:Komputer,Jaringan,Multimedia,Alat Praktik',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|in:Baik,Rusak,Perlu Perbaikan',
            'lokasi' => 'required|string|max:100',
            'tanggal_input' => 'required|date',
        ]);

        $validated['user_id'] = Auth::id();
        Barang::create($validated);

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function show(int $id)
    {
        $barang = Barang::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('barangs.show', compact('barang'));
    }

    public function edit(int $id)
    {
        $barang = Barang::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('barangs.edit', compact('barang'));
    }

    public function update(Request $request, int $id)
    {
        $barang = Barang::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $validated = $request->validate([
            'nama_barang' => 'required|string|max:100',
            'kode_barang' => 'required|string|unique:barang,kode_barang,' . $id . '|max:50',
            'kategori' => 'required|in:Komputer,Jaringan,Multimedia,Alat Praktik',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|in:Baik,Rusak,Perlu Perbaikan',
            'lokasi' => 'required|string|max:100',
            'tanggal_input' => 'required|date',
        ]);

        $barang->update($validated);
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil diupdate!');
    }

    public function destroy(int $id)
    {
        $barang = Barang::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $barang->delete();

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus!');
    }
}