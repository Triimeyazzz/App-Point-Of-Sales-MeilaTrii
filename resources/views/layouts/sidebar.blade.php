<aside class="main-sidebar sidebar-dark-cyan elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link navbar-indigo">
        <img src="{{ asset('dist/img/4a.jpeg') }}" alt="4a" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span
            class="brand-text font-weight-light">{{ $pengaturan->where('key', 'nama_perusahaan')->first()->value }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar navbar-purple">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Storage::url(Auth::user()->photo ?? '../../dist/img/default-150x150.png') }}"
                    class="img-circle elevation-2" alt ="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name ?? '' }}
                    ({{ Auth::user()->getRoleNames()->first() }})</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 navbar-primary navbar-light">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ Request::route()->getName() == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">Master</li>
                <li class="nav-item">
                    <a href="{{ route('pelanggan.index') }}"
                        class="nav-link {{ Request::route()->getName() == 'pelanggan.index' || Request::route()->getName() == 'pelanggan.edit' || Request::route()->getName() == 'pelanggan.create' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customer</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('supplier.index') }}"
                        class="nav-link {{ Request::route()->getName() == 'supplier.index' || Request::route()->getName() == 'supplier.edit' || Request::route()->getName() == 'supplier.create' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Supplier</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penjualan.index') }}"
                        class="nav-link {{ Request::route()->getName() == 'penjualan.index' || Request::route()->getName() == 'penjualan.edit' || Request::route()->getName() == 'penjualan.create' || Request::route()->getName() == 'penjualan.show' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>Sales</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pembelian.index') }}"
                        class="nav-link {{ Request::route()->getName() == 'pembelian.index' || Request::route()->getName() == 'pembelian.edit' || Request::route()->getName() == 'pembelian.create' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>Purchase</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ Request::route()->getName() == 'produk.index' || Request::route()->getName() == 'kategori.index' || Request::route()->getName() == 'brand.index' || Request::route()->getName() == 'unit.index' || Request::route()->getName() == 'produk.edit' || Request::route()->getName() == 'produk.create' ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::route()->getName() == 'produk.index' || Request::route()->getName() == 'kategori.index' || Request::route()->getName() == 'brand.index' || Request::route()->getName() == 'unit.index' || Request::route()->getName() == 'produk.edit' || Request::route()->getName() == 'produk.create' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Navigation
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('kategori.index') }}"
                                class="nav-link {{ Request::route()->getName() == 'kategori.index' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('produk.index') }}"
                                class="nav-link {{ Request::route()->getName() == 'produk.index' || Request::route()->getName() == 'produk.edit' || Request::route()->getName() == 'produk.create' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-archive"></i>
                                <p>Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('brand.index') }}"
                                class="nav-link {{ Request::route()->getName() == 'brand.index' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-suitcase"></i>
                                <p>Brand</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('unit.index') }}"
                                class="nav-link {{ Request::route()->getName() == 'unit.index' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cubes"></i>
                                <p>Unit</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Report</li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>Purchase</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>Expenditure</p>
                    </a>
                </li>
                <li class="nav-header">Administration</li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ Request::route()->getName() == 'users.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>User</p>
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
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Setting</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
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
