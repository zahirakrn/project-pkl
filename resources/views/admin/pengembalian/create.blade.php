@extends('layouts.backend.template')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Table/</span> Pengembalian</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Pengembalian</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pengembalian.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Nama Barang</label>
                    <div class="col-sm-10">
                        {{-- <input type="text" class="form-control" id="basic-default-name" placeholder="Nama Barang"
                            name="nama_barang" /> --}}
                        <select name="id_barang" class="form-control">
                            <option selected disabled>Pilih Barang</option>
                            @foreach ($barang as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Tanggal Pengembalian</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="basic-default-name" placeholder="Tanggal Pengembalian"
                            name="tanggal_pengembalian" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Nama Peminjam</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-name" placeholder="Nama Peminjam"
                            name="nama_peminjam" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="basic-default-name" placeholder="Jumlah"
                            name="jumlah" />
                    </div>
                </div>
                {{-- <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-name" placeholder="Status"
                            name="status" />
                        <select class="form-control" name="status">
                                <option selected disabled >Pilih...</option>
                                <option value="Dipinjam">Masih Dipinjam</option>
                                <option value="Dikembalikan">Dikembalikan</option>
                        </select>
                    </div>
                </div> --}}
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('pengembalian.index') }} " class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
