<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
Use Alert;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        confirmDelete('Hapus!', 'Anda Yakin Ingin Menghapusnya?');
        return view('admin.barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('admin.barang.create', compact('barang'));
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
            'nama_barang' => 'required',
            'stok' => 'nullable|integer',
        ]);

        $barang = new barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->stok = $request->stok;
        $barang->save();
        Alert::success('Success', 'Data Behasil Ditambahkan')->autoClose(1000);
        return redirect()->route('barang.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'nullable|integer',
        ]);

        $barang = new barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->stok = $request->stok;
        $barang->save();
        Alert::success('Success', 'Data Behasil Diubah')->autoClose(1000);

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $barang = Barang::findOrFail($id);
       $barang->delete();
        Alert::success('Success', 'Data Behasil DiHapus')->autoClose(1000);
       return redirect()->route('barang.index');

    }
}
