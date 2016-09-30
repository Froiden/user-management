<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>{{ site_name(0) }}</b>{{ site_name(1) }}</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>{{ settings('site_name') }}</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="{{ asset('#') }}" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">


        <li class="dropdown user user-menu">
          <a href="{{ asset('#') }}" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ $admin->present()->avatar }}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{ $admin->present()->displayName }}</span>
            <i class="fa fa-angle-down"></i>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{ $admin->present()->avatar }}" class="img-circle" alt="User Image">

              <p>
                {{ $admin->present()->displayName }}
                <small>@lang('core.memberSince') {{ $admin->present()->memberSince }}</small>
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <button onclick="editAdminModal({{$admin->id}});return false" class="btn btn-default btn-flat">Profile</button>
              </div>
              <div class="pull-right">
                <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </nav>
</header>