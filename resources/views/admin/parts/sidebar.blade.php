<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link  {{Request::is('dashboardAdmin') ? '' : 'collapsed'}}" href="{{route('dashboard.admin')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link {{Request::is('orderan') ? '' : 'collapsed'}}" href="{{route('orderan.index')}}">
          <i class="bi bi-cart"></i>
          <span>Orderan</span>
        </a>
      </li><!-- End Orderan Nav -->
      <li class="nav-item">
        <a class="nav-link {{Request::is('ubahStock') ? '' : 'collapsed'}}" href="{{route('ubahStock')}}">
          <i class="bi bi-tag"></i>
          <span>Ubah Stock</span>
        </a>
      </li><!-- End ubahStock Nav -->
      <li class="nav-item">
        <a class="nav-link {{Request::is('laporan') ? '' : 'collapsed'}}" href="{{route('laporan')}}">
          <i class="bi bi-journals"></i>
          <span>Laporan</span>
        </a>
      </li><!-- End Konfirmasi Nav -->

      <li class="nav-item">
        <a class="nav-link {{Request::is('master*') ? '' : 'collapsed'}}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{Request::is('master*') ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('user.index')}}">
              <i class="bi bi-people"></i><span>User</span>
            </a>
          </li>
          <li>
            <a href="{{route('product.index')}}">
              <i class="bi bi-tag"></i><span>Produk</span>
            </a>
          </li>
          <li>
            <a href="{{route('ruangan.index')}}">
              <i class="bi bi-house"></i><span>Ruangan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

  </aside><!-- End Sidebar-->