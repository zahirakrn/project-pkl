<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama_barang', 'keterangan', 'stok'];
    public $timestamp = true;

    public function barang_masuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }
    public function barang_keluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
    public function pinjaman()
    {
        return $this->hasMany(Pinjaman::class);
    }
    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
}
