@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Detail Barang</h2>
        <p class="text-muted mb-0">Informasi lengkap barang inventaris</p>
    </div>

    <div class="card shadow-sm border-0" style="border-radius:16px;">
        <div class="card-body p-4">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="text-muted small fw-semibold">KODE BARANG</label>
                        <p class="fs-5 fw-bold mb-0">{{ $barang->kode_barang }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="text-muted small fw-semibold">NAMA BARANG</label>
                        <p class="fs-5 fw-bold mb-0">{{ $barang->nama_barang }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="text-muted small fw-semibold">KATEGORI</label>
                        <p class="fs-5 mb-0">{{ $barang->kategori }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="text-muted small fw-semibold">JUMLAH</label>
                        <p class="fs-5 mb-0">{{ $barang->jumlah }} Unit</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="text-muted small fw-semibold">KONDISI</label>
                        <p class="mb-0">
                            <span class="badge {{ $barang->kondisi == 'Baik' ? 'bg-success' : 'bg-warning text-dark' }} px-3 py-2">
                                {{ $barang->kondisi }}
                            </span>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="text-muted small fw-semibold">LOKASI</label>
                        <p class="fs-5 mb-0">{{ $barang->lokasi }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="text-muted small fw-semibold">TANGGAL INPUT</label>
                        <p class="fs-5 mb-0">{{ $barang->tanggal_input->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="text-muted small fw-semibold">DITAMBAHKAN OLEH</label>
                        <p class="fs-5 mb-0">{{ $barang->user->name }}</p>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                <a href="{{ route('barangs.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
                <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil me-1"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endsection