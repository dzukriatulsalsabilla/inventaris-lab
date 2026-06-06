<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userId = Auth::id();

        // Total semua barang
        $totalBarang = Barang::where('user_id', $userId)->sum('jumlah');
        
        // Kondisi Baik
        $kondisiBaik = Barang::where('user_id', $userId)
            ->where('kondisi', 'Baik')
            ->sum('jumlah');
        
        // Kondisi Rusak ATAU Perlu Perbaikan (gabungkan keduanya)
        $kondisiRusak = Barang::where('user_id', $userId)
            ->whereIn('kondisi', ['Rusak', 'Perlu Perbaikan'])
            ->sum('jumlah');
        
        // 5 barang terbaru
        $terbaru = Barang::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('user', 'totalBarang', 'kondisiBaik', 'kondisiRusak', 'terbaru'));
    }
}