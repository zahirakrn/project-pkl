<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Pinjaman;
use App\Models\Pengembalian;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $barang = Barang::count();
        $barangMasuk = BarangMasuk::count();
        $barangKeluar = BarangKeluar::count();
        $pinjaman = Pinjaman::count();
        $pengembalian = Pengembalian::count();




        return view('home', compact('barang', 'barangMasuk', 'barangKeluar','pinjaman','pengembalian'));
    }
}
