# Sistem Inventaris Barang Laboratorium RPL

## 📋 Deskripsi
Aplikasi web untuk mengelola inventaris barang di laboratorium RPL (Rekayasa Perangkat Lunak). 
Sistem ini memungkinkan setiap petugas laboratorium untuk mencatat dan mengelola barang 
inventarisnya sendiri dengan sistem keamanan yang memastikan data hanya dapat diakses oleh pemiliknya.

## 🚀 Teknologi yang Digunakan
- **Framework**: Laravel 13.14.0
- **Bahasa**: PHP 8.5.7
- **Database**: MySQL
- **Frontend**: Bootstrap 5
- **Authentication**: Laravel UI

## ✨ Fitur Utama
- ✅ **Autentikasi User** - Register & Login dengan password hash (bcrypt)
- ✅ **Dashboard** - Statistik real-time total barang, kondisi baik, dan rusak
- ✅ **CRUD Barang** - Create, Read, Update, Delete data barang
- ✅ **Isolasi Data** - User hanya bisa lihat data milik sendiri
- ✅ **Keamanan** - Validasi user_id di setiap query untuk mencegah akses data user lain
- ✅ **Laporan** - Cetak laporan inventaris dengan format profesional
- ✅ **Search & Filter** - Cari barang berdasarkan nama, kode, atau kategori
- ✅ **Responsif** - Tampilan optimal di HP, tablet, dan laptop

## 📦 Cara Install

### 1. Clone atau Download Repository
```bash
# Kalau pakai Git:
git clone [URL_REPOSITORY]
cd inventaris-lab

# Atau download ZIP dan extract