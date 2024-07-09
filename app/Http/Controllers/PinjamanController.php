<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Barang;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjaman = Pinjaman::latest()->get();
        confirmDelete('Hapus!', 'Anda Yakin Ingin Menghapusnya?');

        return view('admin.pinjaman.index', compact('pinjaman'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pinjaman = Pinjaman::all();
        $barang = Barang::all();

        return view('admin.pinjaman.create', compact('pinjaman', 'barang'));

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
            'tanggal_pinjam' => 'required',
            'nama_peminjam' => 'required',
            'jumlah' => 'required',
            // 'status' => 'required',
        ]);

        $pinjaman = new Pinjaman();
        $pinjaman->id_barang = $request->id_barang;
        $pinjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $pinjaman->nama_peminjam = $request->nama_peminjam;
        $pinjaman->jumlah = $request->jumlah;
        $pinjaman->status = "Masih Dipinjam ya";

        $barang = Barang::find($request->id_barang);
        if ($barang->stok < $request->jumlah) {
            Alert::warning('Warning', 'Barang tidak mencukupi')->autoClose(1500);
            return redirect()->route('pinjaman.create');
        } else {
            $barang->stok -= $request->jumlah;
            $barang->save();
            $pinjaman->save();
            Alert::success('Success', 'Data Berhasil Dibuat.')->autoClose(1500);

            return redirect()->route('barangkeluar.index');
        }

        $barang->stok -= $request->jumlah;
        $barang->save();

        $pinjaman->save();
        Alert::success('Success', 'Data Behasil Ditambahkan')->autoClose(1500);
        return redirect()->route('pinjaman.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $barang = Barang::all();
        return view('admin.pinjaman.edit', compact('pinjaman', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required',
            'tanggal_pinjam' => 'required',
            'nama_peminjam' => 'required',
            'jumlah' => 'required',
            'status' => 'required',
        ]);

        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->id_barang = $request->id_barang;
        $pinjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $pinjaman->nama_peminjam = $request->nama_peminjam;
        $pinjaman->jumlah = $request->jumlah;
        $pinjaman->status = $request->status;
        $pinjaman->save();

        // $barang = Barang::find($request->id_barang);
        // $barang->stok = $request->jumlah;
        // $barang->save();

        Alert::success('Success', 'Data Behasil Diubah')->autoClose(1000);
        return redirect()->route('pinjaman.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->delete();
        Alert::success('Success', 'Data Behasil DiHapus')->autoClose(1000);
        return redirect()->route('pinjaman.index');

    }
}
