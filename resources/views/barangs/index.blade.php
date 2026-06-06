@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h2 class="fw-bold mb-1">Data Barang</h2>
            <p class="text-muted mb-0">Kelola inventaris barang Anda</p>
        </div>
        <a href="{{ route('barangs.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> <span class="d-none d-sm-inline">Tambah</span> Barang
        </a>
    </div>

    <!-- Search Box -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius:12px;">
        <div class="card-body p-3">
            <form action="{{ route('barangs.index') }}" method="GET">
                <div class="row g-2">
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" class="form-control border-start-0" 
                                   name="search" 
                                   placeholder="Cari nama barang, kode barang, atau kategori..." 
                                   value="{{ request('search') }}">
                            @if(request('search'))
                            <button type="button" class="btn btn-outline-secondary" onclick="window.location='{{ route('barangs.index') }}'">
                                <i class="bi bi-x"></i>
                            </button>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row g-2">
                            <div class="col-6">
                                <select class="form-select" name="kategori" onchange="this.form.submit()">
                                    <option value="">Semua Kategori</option>
                                    <option value="Komputer" {{ request('kategori') == 'Komputer' ? 'selected' : '' }}>Komputer</option>
                                    <option value="Jaringan" {{ request('kategori') == 'Jaringan' ? 'selected' : '' }}>Jaringan</option>
                                    <option value="Multimedia" {{ request('kategori') == 'Multimedia' ? 'selected' : '' }}>Multimedia</option>
                                    <option value="Alat Praktik" {{ request('kategori') == 'Alat Praktik' ? 'selected' : '' }}>Alat Praktik</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-select" name="kondisi" onchange="this.form.submit()">
                                    <option value="">Semua Kondisi</option>
                                    <option value="Baik" {{ request('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="Rusak" {{ request('kondisi') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                    <option value="Perlu Perbaikan" {{ request('kondisi') == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Barang -->
    <div class="card border-0 shadow-sm" style="border-radius:12px;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4 py-3" width="5%">No</th>
                            <th class="px-4 py-3">Kode</th>
                            <th class="px-4 py-3">Nama Barang</th>
                            <th class="px-4 py-3 d-none d-md-table-cell">Kategori</th>
                            <th class="px-4 py-3 text-center" width="10%">Jumlah</th>
                            <th class="px-4 py-3 d-none d-sm-table-cell">Kondisi</th>
                            <th class="px-4 py-3 d-none d-lg-table-cell">Lokasi</th>
                            <th class="px-4 py-3 d-none d-xl-table-cell">Tanggal</th>
                            <th class="px-4 py-3 text-center" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($barangs as $index => $barang)
                        <tr>
                            <td class="px-4 py-3">{{ $barangs->firstItem() + $index }}</td>
                            <td class="px-4 py-3"><strong>{{ $barang->kode_barang }}</strong></td>
                            <td class="px-4 py-3">{{ $barang->nama_barang }}</td>
                            <td class="px-4 py-3 d-none d-md-table-cell">{{ $barang->kategori }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="badge bg-secondary">{{ $barang->jumlah }}</span>
                            </td>
                            <td class="px-4 py-3 d-none d-sm-table-cell">
                                @if($barang->kondisi == 'Baik')
                                    <span class="badge bg-success">{{ $barang->kondisi }}</span>
                                @elseif($barang->kondisi == 'Rusak')
                                    <span class="badge bg-danger">{{ $barang->kondisi }}</span>
                                @else
                                    <span class="badge bg-warning text-dark">{{ $barang->kondisi }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 d-none d-lg-table-cell">{{ $barang->lokasi }}</td>
                            <td class="px-4 py-3 d-none d-xl-table-cell">{{ $barang->tanggal_input->format('d/m/Y') }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('barangs.show', $barang->id) }}" class="btn btn-info" title="Lihat">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" class="d-inline" 
                                          onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-5">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                @if(request('search'))
                                    Tidak ada hasil pencarian untuk "<strong>{{ request('search') }}</strong>"
                                @else
                                    Belum ada data barang
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        @if($barangs->hasPages())
        <div class="card-footer bg-white border-top py-3">
            {{ $barangs->links() }}
        </div>
        @endif
    </div>
</div>
@endsection