<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Pengembalian;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function report(Request $request)
    {
        $start = $request->tanggalAwal;
        $end = $request->tanggalAkhir;
        $jenisLaporan = $request->jenisLaporan;

        if ($start > $end) {
            Alert::warning('Warning', 'Tanggal yang dimasukkan tidak sesuai');
            return back();
        }

        switch ($jenisLaporan) {
            case 'Barang Masuk':
                $query = BarangMasuk::whereBetween('barang_masuks.created_at', [$start, $end])
                    ->join('barangs', 'barang_masuks.id_barang', '=', 'barangs.id')
                    ->select('barang_masuks.*', 'barangs.nama_barang')
                    ->get();
                $total = BarangMasuk::whereBetween('created_at', [$start, $end])->sum('jumlah');
                break;

            case 'Barang Keluar':
                $query = BarangKeluar::whereBetween('barang_keluars.created_at', [$start, $end])
                    ->join('barangs', 'barang_keluars.id_barang', '=', 'barangs.id')
                    ->select('barang_keluars.*', 'barangs.nama_barang')
                    ->get();
                $total = BarangKeluar::whereBetween('created_at', [$start, $end])->sum('jumlah');
                break;

            case 'Pinjaman':
                $query = Pinjaman::whereBetween('pinjamen.created_at', [$start, $end])
                    ->join('barangs', 'pinjamen.id_barang', '=', 'barangs.id')
                    ->select('pinjamen.*', 'barangs.nama_barang')
                    ->get();
                $total = Pinjaman::whereBetween('created_at', [$start, $end])->count();
                break;

            case 'Pengembalian':
                $query = Pengembalian::whereBetween('pengembalians.created_at', [$start, $end])
                    ->join('barangs', 'pengembalians.id_barang', '=', 'barangs.id')
                    ->select('pengembalians.*', 'barangs.nama_barang')
                    ->get();
                $total = Pengembalian::whereBetween('created_at', [$start, $end])->count();
                break;

            default:
                Alert::warning('Warning', 'Jenis laporan tidak valid');
                return back();
        }

        return view('admin.laporan.report', [
            'data' => $query,
            'total' => $total,
            'start' => $start,
            'end' => $end,
            'jenisLaporan' => $jenisLaporan,
        ]);
    }

    public function printReport(Request $request)
    {
        $start = $request->tanggalAwal;
        $end = $request->tanggalAkhir;
        $jenisLaporan = $request->jenisLaporan;

        switch ($jenisLaporan) {
            case 'Barang Masuk':
                $query = BarangMasuk::whereBetween('barang_masuks.created_at', [$start, $end])
                    ->join('barangs', 'barang_masuks.id_barang', '=', 'barangs.id')
                    ->select('barang_masuks.*', 'barangs.nama_barang')
                    ->get();
                $total = BarangMasuk::whereBetween('created_at', [$start, $end])->sum('jumlah');
                break;

            case 'Barang Keluar':
                $query = BarangKeluar::whereBetween('barang_keluars.created_at', [$start, $end])
                    ->join('barangs', 'barang_keluars.id_barang', '=', 'barangs.id')
                    ->select('barang_keluars.*', 'barangs.nama_barang')
                    ->get();
                $total = BarangKeluar::whereBetween('created_at', [$start, $end])->sum('jumlah');
                break;

            case 'Pinjaman':
                $query = Pinjaman::whereBetween('pinjamen.created_at', [$start, $end])
                    ->join('barangs', 'pinjamen.id_barang', '=', 'barangs.id')
                    ->select('pinjamen.*', 'barangs.nama_barang')
                    ->get();
                $total = Pinjaman::whereBetween('created_at', [$start, $end])->count();
                break;

            case 'Pengembalian':
                $query = Pengembalian::whereBetween('pengembalians.created_at', [$start, $end])
                    ->join('barangs', 'pengembalians.id_barang', '=', 'barangs.id')
                    ->select('pengembalians.*', 'barangs.nama_barang')
                    ->get();
                $total = Pengembalian::whereBetween('created_at', [$start, $end])->count();
                break;
        }

        $pdf = \PDF::loadView('admin.laporan.report_pdf', compact('query', 'start', 'end', 'jenisLaporan', 'total'));
        return $pdf->download('laporan-' . $jenisLaporan . '.pdf');
    }
}
