<!DOCTYPE html>
<html>
<head>
   @include(settings('theme_folder').'admin.sections.meta-data')
   @include(settings('theme_folder').'admin.sections.style')

</head>
<body class="hold-transition skin-{{settings('theme-color')}} sidebar-mini">
<div class="wrapper">
    @include(settings('theme_folder') . 'admin.sections.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include(settings('theme_folder') . 'admin.sections.sidebar')

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        @yield('page-header')

        <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>

            <!-- /.content -->
            @yield('modals')
        </div>
        <!-- /.content-wrapper -->

     {{--Footer section--}}
    @include(settings('theme_folder') . 'admin.sections.footer')


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
@include(settings('theme_folder').'admin.sections.footer-scripts')
@yield('scripts-footer')

</body>
</html>
