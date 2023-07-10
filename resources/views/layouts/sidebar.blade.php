  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-heading">Main Menu</li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('home') ? '' : 'collapsed' }}" href="/home">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @auth
        @if (Auth::user()->role == 'Sales')

      {{-- Sales Menu --}}
      <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'customer' ? '' : 'collapsed' }}" data-bs-target="#customer-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-lines-fill"></i></i><span>Customer</span>
        </a>
        <ul id="customer-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/customers">
              <i class="bi bi-circle"></i><span>Customer Data</span>
            </a>
          </li>
          <li>
            <a class="btn" type="button" data-bs-toggle="modal" data-bs-target="#AddCustomer">
              <i class="bi bi-circle"></i><span>Add Costumer</span>
            </a>
          </li>
        </ul>
      </li>
    {{-- End Sales Menu --}}

    @elseif (Auth::user()->role == 'Admin')
    {{-- Admin Menu --}}
      <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'packages' ? '' : 'collapsed' }}" data-bs-target="#packet-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-boxes"></i><span>Package</span>
        </a>
        <ul id="packet-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/packages">
              <i class="bi bi-circle"></i><span>Package Data</span>
            </a>
          </li>
          <li>
            <a class="btn" type="button" data-bs-toggle="modal" data-bs-target="#AddPackages">
              <i class="bi bi-circle"></i><span>Add Package</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'sales' ? '' : 'collapsed' }}" data-bs-target="#sales-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-people"></i><span>Sales</span>
        </a>
        <ul id="sales-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/sales-data">
              <i class="bi bi-circle"></i><span>Sales Data</span>
            </a>
          </li>
          <li>
            <a class="btn" type="button" data-bs-toggle="modal" data-bs-target="#AddSales">
              <i class="bi bi-circle"></i><span>Add Sales</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'report' ? '' : 'collapsed' }}" href="/report">
            <i class="bi bi-journals"></i>
          <span>Report</span>
        </a>
      </li>
      {{-- End Admin Menu --}}
      @endif
      @endauth

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'profile' ? '' : 'collapsed' }}" href="/profile">
            <i class="bi bi-person-circle"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i>
          <span>Log Out</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->
