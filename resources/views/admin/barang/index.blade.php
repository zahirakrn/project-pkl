@extends('layouts.backend.template')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
@endsection
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Barang</h4>
    <div class="card">
        <div class="card-body">
            <h4 class="card-header">Table Barang <a href="{{ route('barang.create') }}" class="btn btn-sm btn-primary"
                style="float: right"> + Tambah Data</a></h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $data)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $data->nama_barang }}</td>
                                <td>{{ $data->stok }}</td>
                                <td>
                                    <form action="{{ route('barang.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('barang.edit', $data->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit </a>
                                                <a href="{{ route('barang.destroy', $data->id) }}" class="dropdown-item"
                                                    data-confirm-delete="true"><i class="bx bx-trash-alt me-1"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script> 

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
    <script>
        new DataTable('#example', {
            layout: {
                topStart: {
                    buttons: ['pdf', 'excel']
                }
            }
        });
    </script> 
@endpush
