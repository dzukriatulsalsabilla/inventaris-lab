@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h2 class="fw-bold mb-1">Dashboard</h2>
            <p class="text-muted mb-0">Ringkasan inventaris barang Anda</p>
        </div>
        <a href="{{ route('barangs.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Barang
        </a>
    </div>
    
    <!-- Statistics Cards -->
    <div class="row g-3 g-md-4 mb-4">
        <div class="col-6 col-lg-3">
            <div class="card stat-card bg-gradient-primary h-100" style="border-radius:12px;">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <small class="opacity-75 d-block mb-1">Total Barang</small>
                            <h2 class="fw-bold mb-1">{{ $totalBarang }}</h2>
                            <small class="opacity-75">Unit</small>
                        </div>
                        <i class="bi bi-box-seam fs-1 opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-6 col-lg-3">
            <div class="card stat-card bg-gradient-success h-100" style="border-radius:12px;">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <small class="opacity-75 d-block mb-1">Kondisi Baik</small>
                            <h2 class="fw-bold mb-1">{{ $kondisiBaik }}</h2>
                            <small class="opacity-75">Unit</small>
                        </div>
                        <i class="bi bi-check-circle fs-1 opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-6 col-lg-3">
            <div class="card stat-card bg-gradient-danger h-100" style="border-radius:12px;">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <small class="opacity-75 d-block mb-1">Rusak</small>
                            <h2 class="fw-bold mb-1">{{ $kondisiRusak }}</h2>
                            <small class="opacity-75">Unit</small>
                        </div>
                        <i class="bi bi-exclamation-triangle fs-1 opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-6 col-lg-3">
            <div class="card stat-card bg-gradient-info h-100" style="border-radius:12px;">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <small class="opacity-75 d-block mb-1">Jenis Barang</small>
                            <h2 class="fw-bold mb-1">{{ $terbaru->count() }}</h2>
                            <small class="opacity-75">Tipe</small>
                        </div>
                        <i class="bi bi-tags fs-1 opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Items -->
    <div class="card border-0 shadow-sm" style="border-radius:12px;">
        <div class="card-header bg-white border-0 pt-4 px-4">
            <h5 class="fw-bold mb-0">
                <i class="bi bi-clock-history me-2"></i>5 Barang Terbaru
            </h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4 py-3">Kode</th>
                            <th class="px-4 py-3">Nama Barang</th>
                            <th class="px-4 py-3 d-none d-md-table-cell">Kategori</th>
                            <th class="px-4 py-3 text-center" width="10%">Jumlah</th>
                            <th class="px-4 py-3">Kondisi</th>
                            <th class="px-4 py-3 d-none d-lg-table-cell">Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($terbaru as $item)
                        <tr>
                            <td class="px-4 py-3"><strong>{{ $item->kode_barang }}</strong></td>
                            <td class="px-4 py-3">{{ $item->nama_barang }}</td>
                            <td class="px-4 py-3 d-none d-md-table-cell">{{ $item->kategori }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="badge bg-secondary">{{ $item->jumlah }}</span>
                            </td>
                            <td class="px-4 py-3">
                                @if($item->kondisi == 'Baik')
                                    <span class="badge bg-success">{{ $item->kondisi }}</span>
                                @elseif($item->kondisi == 'Rusak')
                                    <span class="badge bg-danger">{{ $item->kondisi }}</span>
                                @else
                                    <span class="badge bg-warning text-dark">{{ $item->kondisi }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 d-none d-lg-table-cell">{{ $item->lokasi }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Belum ada data barang
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection