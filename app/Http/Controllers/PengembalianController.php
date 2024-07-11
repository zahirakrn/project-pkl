<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Barang;
use App\Models\Pengembalian;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalian = Pinjaman::where('status', 'Dikembalikan')->get();

        confirmDelete('Hapus!', 'Anda Yakin Ingin Menghapusnya?');

        return view('admin.pengembalian.index', compact('pengembalian'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengembalian = Pengembalian::all();
        $barang = Barang::all();
        return view('admin.pengembalian.create', compact('pengembalian', 'barang'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'id_barang' => 'required',
        //     'tanggal_pengembalian' => 'required',
        //     'nama_peminjam' => 'required',
        //     'jumlah' => 'required',
        //     'status' => 'required',
        // ]);

        $pengembalian = new Pinjamanan();
        $pengembalian->id_barang = $request->id_barang;
        $pengembalian->tanggal_pengembalian = $request->tanggal_pengembalian;
        $pengembalian->nama_peminjam = $request->nama_peminjam;
        $pengembalian->jumlah = $request->jumlah;
        $pengembalian->status = "Sudah Dikembalikan Ya";

        $barang = Barang::find($request->id_barang);
        $barang->stok += $request->jumlah;
        $barang->save();

        $pengembalian->save();
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('pengembalian.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $barang = Barang::all();
        return view('admin.pengembalian.edit', compact('pengembalian', 'barang'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'id_barang' => 'required',
        //     'tanggal_pengembalian' => 'required',
        //     'nama_peminjam' => 'required',
        //     'jumlah' => 'required',
        //     'status' => 'required',
        // ]);

        $pinjaman = Pengembalian::findOrFail($id);
        $pinjaman->id_barang = $request->id_barang;
        $pinjaman->tanggal_pengembalian = $request->tanggal_pengembalian;
        $pinjaman->nama_peminjam = $request->nama_peminjam;
        $pinjaman->jumlah = $request->jumlah;
        $pinjaman->status = $request->status;
        $pinjaman->save();

        $barang = Barang::find($request->id_barang);
        $barang->stok += $request->jumlah;
        $barang->save();

        Alert::success('Success', 'Data Behasil Diubah')->autoClose(1000);
        return redirect()->route('pengembalian.index');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->delete();
        Alert::success('Success', 'Data Behasil DiHapus')->autoClose(1000);
        return redirect()->route('pengembalian.index');

    }
}
