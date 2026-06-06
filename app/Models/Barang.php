<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'user_id',
        'nama_barang',
        'kode_barang',
        'kategori',
        'jumlah',
        'kondisi',
        'lokasi',
        'tanggal_input'
    ];

    // TAMBAHKAN INI - Cast tanggal_input menjadi date
    protected $casts = [
        'tanggal_input' => 'date',
        'jumlah' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}