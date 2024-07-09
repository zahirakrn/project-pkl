<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_barang', 'tanggal_pinjam', 'nama_peminjam', 'jumlah'];
    public $timestamp = true;

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
