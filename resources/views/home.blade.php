@extends('layouts.backend.template')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-check-circle"></i></span>
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="{{ route('pengembalian.index') }}"">View More</a>
                  {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                </div>
              </div>
            </div>
            <h4>Pengembalian</h4>
            <h4 class="card-title text-nowrap mb-1"></h4>
            <p class="d-flex align-items-center text-success"><i class="bx bx-check-double me-2"></i>Completed</p>
            {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-primary">
                <i class="bx bx-package"></i></span>
            </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="{{ route('barang.index') }}">View More</a>
                   {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                </div>
              </div>
            </div>
            <h4>Barang</h4>
            <h4 class="card-title text-nowrap mb-1">{{ $barang }}</h4>
            {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
               <span class="avatar-initial rounded bg-label-info"><i class="bx bxs-truck"></i></span>
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="{{ route('barangmasuk.index') }}">View More</a>
                  {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                </div>
              </div>
            </div>
            <h4>Barang Masuk</h4>
            <h4 class="card-title text-nowrap mb-1">{{$barangMasuk}}</h4>
            {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
          </div>
        </div>
      </div>
       <div class="col-lg-4 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="avatar-initial rounded bg-label-danger"><i class="bx bx-error"></i></span>
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="{{ route('barangkeluar.index') }}">View More</a>
                  {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                </div>
              </div>
            </div>
            <h4>Barang Keluar</h4>
            <h4 class="card-title text-nowrap mb-1">{{$barangKeluar}}</h4>
            {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="avatar-initial rounded bg-label-secondary"><i class="bx bx-time-five"></i></span>
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="{{ route('pinjaman.index') }}"">View More</a>
                  {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                </div>
              </div>
            </div>
            <h4>Pinjaman</h4>
            <h4 class="card-title text-nowrap mb-1">{{$pinjaman}}</h4>
            {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
          </div>
        </div>
      </div>
    </div>
@endsection