<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="https://smkassalaambandung.sch.id/" class="app-brand-link">
            <img src="{{asset('admin/assets/img/layouts/download.png')}}" width="100" height="100">
             <span class="app-brand-text demo menu-text fw-bolder ms-3"></span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        
        <li class="menu-item">
            <a href="{{ route('barang.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Layouts">Barang</div>
            </a>
        </li>
            <li class="menu-item">
            <a href="{{ route('barangmasuk.index') }}" class="menu-link">
                   <i class='menu-icon ft-icons bx bxs-arrow-from-right'></i>
                   <div data-i18n="Barang Masuk">Barang Masuk</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('barangkeluar.index') }}" class="menu-link">
                   <i class='menu-icon ft-icons bx bxs-arrow-from-left'></i>
                   <div data-i18n="Barang Masuk">Barang Keluar</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('pinjaman.index') }}"class="menu-link">
                  <i class='menu-icon ft-icons bx bxs-arrow-to-top'></i>
                   <div data-i18n="Barang Masuk">Pinjaman</div>
            </a>
        </li>
         <li class="menu-item">
            <a href="{{ route('pengembalian.index') }}"class="menu-link">
                  <i class='menu-icon ft-icons bx bxs-arrow-to-bottom'></i>
                   <div data-i18n="Barang Masuk">Pengembalian</div>
            </a>
        </li>
</aside>
