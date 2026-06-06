@extends('layouts.app')

@section('content')
<div class="container-fluid px-0" id="area-cetak">
    <!-- Header Laporan -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius:12px;">
        <div class="card-body p-4 p-md-5">
            <!-- Judul - Center -->
            <div class="text-center mb-4">
                <h2 class="fw-bold mb-2">LABORATORIUM RPL</h2>
                <h5 class="text-muted mb-0">LAPORAN INVENTARIS BARANG</h5>
            </div>
            
            <!-- Info Petugas - Left Align -->
            <div class="mt-4">
                <div class="mb-2">
                    <strong>Petugas:</strong> {{ $user->name }}
                </div>
                <div class="mb-2">
                    <strong>Email:</strong> {{ $user->email }}
                </div>
                <div class="mb-3">
                    <strong>Tanggal Cetak:</strong> {{ now()->format('d F Y') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Laporan -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius:12px;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4 py-3 text-center" width="5%">No</th>
                            <th class="px-4 py-3">Kode Barang</th>
                            <th class="px-4 py-3">Nama Barang</th>
                            <th class="px-4 py-3">Kategori</th>
                            <th class="px-4 py-3 text-center" width="10%">Jumlah</th>
                            <th class="px-4 py-3">Kondisi</th>
                            <th class="px-4 py-3">Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($barangs as $index => $item)
                        <tr>
                            <td class="px-4 py-3 text-center">{{ $index + 1 }}</td>
                            <td class="px-4 py-3"><strong>{{ $item->kode_barang }}</strong></td>
                            <td class="px-4 py-3">{{ $item->nama_barang }}</td>
                            <td class="px-4 py-3">{{ $item->kategori }}</td>
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
                            <td class="px-4 py-3">{{ $item->lokasi }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Tidak ada data barang
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    @if($barangs->count() > 0)
                    <tfoot class="table-light">
                        <tr>
                            <th colspan="4" class="text-end px-4 py-3">TOTAL KESELURUHAN:</th>
                            <th class="text-center px-4 py-3">
                                <span class="badge bg-primary fs-6">{{ $totalKeseluruhan }}</span>
                            </th>
                            <th colspan="2" class="px-4 py-3">Unit</th>
                        </tr>
                    </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <!-- Tanda Tangan -->
    @if($barangs->count() > 0)
    <div class="row mt-5 pt-4">
        <div class="col-md-6 offset-md-6">
            <div class="text-center">
                <p class="mb-1">Mengetahui,</p>
                <br><br><br>
                <p class="fw-bold mb-1">{{ $user->name }}</p>
                <p class="text-muted mb-0">Petugas Laboratorium</p>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Tombol Cetak (Tidak muncul saat print) -->
<div class="position-fixed bottom-0 end-0 p-4 no-print">
    <button onclick="window.print()" class="btn btn-success btn-lg shadow-lg">
        <i class="bi bi-printer me-2"></i>Cetak Laporan
    </button>
</div>

@push('scripts')
<style>
@media print {
    /* Sembunyikan SEMUA elemen yang tidak perlu */
    * {
        color: black !important;
        background: white !important;
        text-shadow: none !important;
        box-shadow: none !important;
    }
    
    /* Sembunyikan sidebar, navbar, dan semua navigasi */
    .sidebar,
    .top-navbar,
    .navbar,
    nav,
    header,
    footer,
    .no-print,
    button,
    .btn,
    .position-fixed,
    .bi,
    [class*="bi-"] {
        display: none !important;
        visibility: hidden !important;
        width: 0 !important;
        height: 0 !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    
    /* Reset layout */
    body {
        background: white !important;
        margin: 0 !important;
        padding: 0 !important;
        font-family: 'Times New Roman', Times, serif !important;
        font-size: 12pt !important;
        line-height: 1.5 !important;
    }
    
    .container-fluid {
        padding: 0 !important;
        margin: 0 !important;
        width: 100% !important;
        max-width: 100% !important;
    }
    
    .row {
        margin: 0 !important;
        width: 100% !important;
    }
    
    .col-md-9,
    .col-lg-10,
    .main-content {
        margin-left: 0 !important;
        margin-right: 0 !important;
        width: 100% !important;
        max-width: 100% !important;
        padding: 0 !important;
        flex: 0 0 100% !important;
    }
    
    /* Hilangkan card styling */
    .card {
        border: none !important;
        border-radius: 0 !important;
        box-shadow: none !important;
        margin-bottom: 20px !important;
        page-break-inside: avoid;
    }
    
    .card-body {
        padding: 0 !important;
    }
    
    /* Judul laporan */
    h2, h3, h4, h5 {
        text-align: center !important;
        font-weight: bold !important;
        margin-bottom: 10px !important;
    }
    
    h2 {
        font-size: 18pt !important;
        text-transform: uppercase !important;
    }
    
    h5 {
        font-size: 14pt !important;
        margin-bottom: 20px !important;
    }
    
    /* Info petugas rata kiri */
    .mb-2, .mb-3 {
        margin-bottom: 8px !important;
        text-align: left !important;
    }
    
    strong {
        font-weight: bold !important;
    }
    
    /* Tabel formal hitam putih */
    .table {
        width: 100% !important;
        border-collapse: collapse !important;
        font-size: 11pt !important;
        margin-top: 20px !important;
    }
    
    .table th,
    .table td {
        border: 1px solid black !important;
        padding: 8px !important;
        text-align: left !important;
        vertical-align: middle !important;
    }
    
    .table th {
        background: white !important;
        font-weight: bold !important;
        text-align: center !important;
        text-transform: uppercase !important;
    }
    
    .table thead {
        display: table-header-group !important;
    }
    
    /* HILANGKAN SEMUA BADGE - JADI TEXT BIASA */
    .badge {
        background: transparent !important;
        color: black !important;
        border: none !important;
        padding: 0 !important;
        margin: 0 !important;
        font-weight: normal !important;
        border-radius: 0 !important;
        display: inline !important;
        font-size: inherit !important;
        line-height: inherit !important;
    }
    
    /* Total keseluruhan - hilangkan badge styling */
    tfoot th {
        font-weight: bold !important;
        text-align: right !important;
    }
    
    tfoot .badge {
        background: transparent !important;
        border: none !important;
        font-weight: bold !important;
        font-size: 11pt !important;
    }
    
    /* Tanda tangan */
    .row.mt-5 {
        margin-top: 40px !important;
        page-break-inside: avoid;
    }
    
    .text-center {
        text-align: center !important;
    }
    
    .fw-bold {
        font-weight: bold !important;
    }
    
    .text-muted {
        color: black !important;
        opacity: 1 !important;
    }
    
    /* Hilangkan page break di tengah tabel */
    tr {
        page-break-inside: avoid;
    }
    
    /* Page settings */
    @page {
        margin: 2cm 2.5cm;
        size: A4 portrait;
    }
}
</style>
@endpush
@endsection