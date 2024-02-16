<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/4a.jpeg') }}" alt="4a" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span
            class="brand-text font-weight-light">{{ $pengaturan->where('key', 'nama_perusahaan')->first()->value }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Storage::url(Auth::user()->photo ?? '../../dist/img/default-150x150.png') }}" class="img-circle elevation-2" alt ="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name ?? '' }} ({{ Auth::user()->getRoleNames()->first() }})</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">Master</li>
                <li class="nav-item">
                    <a href="{{ route('pelanggan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Pelanggan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('supplier.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Supplier</p>
                    </a>
                </li>
                <li class="nav-header">Produk</li>
                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>Produk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('brand.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-suitcase"></i>
                        <p>Brand</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('unit.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>Unit</p>
                    </a>
                </li>
                <li class="nav-header">Laporan</li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>Pembelian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>Pengeluaran</p>
                    </a>
                </li>
                <li class="nav-header">Administrasi</li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Role</p>
                    </a>
                </li> --}}
                {{-- <li class="nav-header">Misc</li> --}}
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Pengaturan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Keluar</p>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
