<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">
            <li class="header">@lang('menu.main_navigation')</li>
            <li @if(strpos(\Request::route()->getName(),'dashboard')) class="active" @endif>
                <a href="{{ route('admin.dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> <span>@lang('menu.dashboard')</span>
                </a>
            </li>
            <li @if(strpos(\Request::route()->getName(),'users')) class="active" @endif>
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-users"></i> <span>@lang('menu.users')</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>