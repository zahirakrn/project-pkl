<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangMasuk = BarangMasuk::latest()->get();
        confirmDelete('Hapus!', 'Anda Yakin Ingin Menghapusnya?');

        return view('admin.barangmasuk.index', compact('barangMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangMasuk = BarangMasuk::all();
        $barang = Barang::all();

        return view('admin.barangmasuk.create', compact('barangMasuk', 'barang'));
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
            'tanggal_masuk' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        $barangMasuk = new BarangMasuk();
        $barangMasuk->id_barang = $request->id_barang;
        $barangMasuk->tanggal_masuk = $request->tanggal_masuk;
        $barangMasuk->jumlah = $request->jumlah;
        $barangMasuk->keterangan = $request->keterangan;

        $barang = Barang::find($request->id_barang);
        $barang->stok += $request->jumlah;
        $barang->save();

        $barangMasuk->save();
        Alert::success('Success', 'Data Behasil Ditambahkan')->autoClose(1000);

        return redirect()->route('barangmasuk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barang = Barang::all();
        return view('admin.barangmasuk.edit', compact('barangMasuk', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required',
            'tanggal_masuk' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        $barangMasuk = BarangMasuk::findOrFail($id);
        $barang = $barangMasuk->barang;
        $barang->stok = $barang->stok - $barangMasuk->jumlah + $request->jumlah;
        $barang->save();

        $barangMasuk->update($request->all());
        Alert::success('Success', 'Data Behasil Diubah')->autoClose(1000);
        return redirect()->route('barangmasuk.index');
        
        
        
        // $barangMasuk->id_barang = $request->id_barang;
        // $barangMasuk->tanggal_masuk = $request->tanggal_masuk;
        // $barangMasuk->jumlah = $request->jumlah;
        // $barangMasuk->keterangan = $request->keterangan;
        // $barangMasuk->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barang = $barangMasuk->barang;
        $barang->stok -= $barangMasuk->jumlah;
        $barang->save();
        
        $barangMasuk->delete();
        Alert::success('Success', 'Data Behasil DiHapus')->autoClose(1000);
        return redirect()->route('barangmasuk.index');

    }
}
