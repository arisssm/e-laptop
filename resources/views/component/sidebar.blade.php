<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ url('/dashboard')}}"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"
                            srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item">
                    <a href="{{ url('/') }}" class='sidebar-link'>
                        <i class="fa-solid fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('/keranjang')}}" class='sidebar-link'>
                        <i class="fa-solid fa-shopping-cart"></i>
                        <span>Keranjang</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('/pesanan')}}" class='sidebar-link'>
                        <i class="fa-solid fa-shopping-bag"></i>
                        <span>Pesanan</span>
                    </a>
                </li>
                <li class="sidebar-title"><i class="fa-solid fa-database me-3"></i><b>Master Data</b></li>

                <li class="sidebar-item @if(Request::segment(1) == 'merek') active @endif">
                    <a href="{{ url('/merek')}}" class='sidebar-link'>
                        <i class="fa-solid fa-tags"></i>
                        <span>Merek</span>
                    </a>
                </li>
                <li class="sidebar-item @if(Request::segment(1) == 'produk') active @endif">
                    <a href="{{ url('/produk')}}" class='sidebar-link'>
                        <i class="fa-solid fa-laptop-code"></i>
                        <span>Produk</span>         
                    </a>
                </li>
                <li class="sidebar-item @if(Request::segment(1) == 'bank') active @endif">
                    <a href="{{ url('/bank')}}" class='sidebar-link' target=''>
                        <i class="fa-solid fa-coins"></i>
                        <span>Bank</span>
                    </a>
                </li>
                <li class="sidebar-item @if(Request::segment(1) == 'pengiriman') active @endif">
                    <a href="{{ url('/pengiriman')}}" class='sidebar-link'>
                        <i class="fa-solid fa-truck-monster"></i>
                        <span>Pengiriman</span>
                    </a>
                </li>
                <li class="sidebar-item @if(Request::segment(1) == 'banner') active @endif">
                    <a href="{{ url('/banner/satu')}}" class='sidebar-link'>
                        <i class="fa-solid fa-images"></i>
                        <span>Banner</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
