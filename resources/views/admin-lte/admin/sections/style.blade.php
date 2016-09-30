<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="{{ theme_url('bootstrap/css/bootstrap.min.css') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ theme_url('css/AdminLTE.min.css') }}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ theme_url('css/skins/skin-'.settings('theme-color').'.min.css') }}">
<!-- Pace -->
<link rel="stylesheet" href="{{theme_url('plugins/pace/pace.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ theme_url('plugins/iCheck/square/blue.css')}}">
{{--Froiden Helper--}}
<link rel="stylesheet" href="{{ theme_url('plugins/froiden-helper/helper.css')}}">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="{{ asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
<script src="{{ asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
<![endif]-->
@yield('style')
