<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    // HAPUS __construct()
    
    public function index()
    {
        $user = Auth::user();
        $barangs = Barang::where('user_id', Auth::id())->get();
        $totalKeseluruhan = $barangs->sum('jumlah');

        return view('laporan.index', compact('user', 'barangs', 'totalKeseluruhan'));
    }
}