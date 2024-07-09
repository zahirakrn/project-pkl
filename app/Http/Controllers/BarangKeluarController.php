<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangKeluar = BarangKeluar::latest()->get();
        confirmDelete('Hapus!', 'Anda Yakin Ingin Menghapusnya?');
        return view('admin.barangkeluar.index', compact('barangKeluar'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangKeluar = BarangKeluar::latest()->get();
        $barang = Barang::all();

        return view('admin.barangkeluar.create', compact('barangKeluar', 'barang'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'tanggal_keluar' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        $barangKeluar = new BarangKeluar();
        $barangKeluar->id_barang = $request->id_barang;
        $barangKeluar->tanggal_keluar = $request->tanggal_keluar;
        $barangKeluar->jumlah = $request->jumlah;
        $barangKeluar->keterangan = $request->keterangan;

        $barang = Barang::find($request->id_barang);
        if ($barang->stok < $request->jumlah) {
            Alert::warning('Warning', 'Barang tidak mencukupi')->autoClose(1500);
            return redirect()->route('barangkeluar.create');
        } else {
            $barang->stok -= $request->jumlah;
            $barang->save();
            $barangKeluar->save();
            Alert::success('Success', 'Data Berhasil Dibuat.')->autoClose(1500);

            return redirect()->route('barangkeluar.index');
        }

        $barang->stok -= $request->jumlah;
        $barang->save();

        $barangKeluar->save();
        Alert::success('Success', 'Data Behasil Ditambahkan')->autoClose(1500);
        return redirect()->route('barangkeluar.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barang = Barang::all();
        return view('admin.barangkeluar.edit', compact('barangKeluar', 'barang'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required',
            'tanggal_keluar' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        $barangKeluar = new BarangKeluar();
        $barangKeluar->id_barang = $request->id_barang;
        $barangKeluar->tanggal_keluar = $request->tanggal_keluar;
        $barangKeluar->jumlah = $request->jumlah;
        $barangKeluar->keterangan = $request->keterangan;
        $barangKeluar->save();
        Alert::success('Success', 'Data Behasil Diubah')->autoClose(1500);
        return redirect()->route('barangkeluar.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangKeluar->delete();
        Alert::success('Success', 'Data Behasil DiHapus')->autoClose(1500);
        return redirect()->route('barangkeluar.index');

    }
}
