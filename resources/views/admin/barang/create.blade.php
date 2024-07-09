@extends('layouts.backend.template')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Table/</span> Barang</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Barang</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('barang.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-name" placeholder="Nama Barang"
                            name="nama_barang" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Stok</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="basic-default-name" placeholder="Stok(Opsional)"
                            name="stok" />
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('barang.index') }} " class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
