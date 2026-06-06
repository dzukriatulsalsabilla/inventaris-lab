@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Tambah Barang Baru</h2>
        <p class="text-muted mb-0">Lengkapi form berikut untuk menambah barang</p>
    </div>

    <div class="card shadow-sm border-0" style="border-radius:16px;">
        <div class="card-body p-4">
            <form action="{{ route('barangs.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold">Nama Barang <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" 
                               name="nama_barang" value="{{ old('nama_barang') }}" required>
                        @error('nama_barang')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold">Kode Barang <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" 
                               name="kode_barang" value="{{ old('kode_barang') }}" required>
                        @error('kode_barang')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('kategori') is-invalid @enderror" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Komputer" {{ old('kategori') == 'Komputer' ? 'selected' : '' }}>Komputer</option>
                            <option value="Jaringan" {{ old('kategori') == 'Jaringan' ? 'selected' : '' }}>Jaringan</option>
                            <option value="Multimedia" {{ old('kategori') == 'Multimedia' ? 'selected' : '' }}>Multimedia</option>
                            <option value="Alat Praktik" {{ old('kategori') == 'Alat Praktik' ? 'selected' : '' }}>Alat Praktik</option>
                        </select>
                        @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold">Jumlah <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" 
                               name="jumlah" value="{{ old('jumlah') }}" min="1" required>
                        @error('jumlah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold">Kondisi <span class="text-danger">*</span></label>
                        <select class="form-select @error('kondisi') is-invalid @enderror" name="kondisi" required>
                            <option value="">Pilih Kondisi</option>
                            <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Rusak" {{ old('kondisi') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                            <option value="Perlu Perbaikan" {{ old('kondisi') == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                        </select>
                        @error('kondisi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold">Lokasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" 
                               name="lokasi" value="{{ old('lokasi') }}" required>
                        @error('lokasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold">Tanggal Input <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal_input') is-invalid @enderror" 
                               name="tanggal_input" value="{{ old('tanggal_input', date('Y-m-d')) }}" required>
                        @error('tanggal_input')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('barangs.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection