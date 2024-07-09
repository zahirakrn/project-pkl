<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'tanggal_masuk', 'jumlah', 'keterangan', 'id_barang'];
    public $timestamp = true;

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
