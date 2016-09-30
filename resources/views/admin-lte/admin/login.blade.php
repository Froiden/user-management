<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ settings('site_name') }} | {{ $pageTitle }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ theme_url('bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ theme_url('css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ theme_url('plugins/iCheck/square/blue.css')}}">
    <link rel="stylesheet" href="{{ theme_url('plugins/froiden-helper/helper.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>{{ settings('site_name') }}</b> {{ $pageTitle }}
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">@lang('messages.signInMessage')</p>

        {!!  Form::open(['url' => '', 'method' => 'post','class'=>'login-form']) 	 !!}
            <div id="alert"></div>
            <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="@lang('core.email')">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="@lang('core.password')">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> @lang('core.rememberMe')
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="login();return false;" >@lang('core.signIn')</button>
                </div>
                <!-- /.col -->
            </div>
        {!! Form::close()  !!}



        {{--<a href="#">I forgot my password</a><br>--}}
        {{--<a href="register.html" class="text-center">Register a new membership</a>--}}

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="{{ theme_url('plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ theme_url('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ theme_url('plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{ theme_url('plugins/froiden-helper/helper.js')}}"></script>
<!-- Laravel Javascript Validation -->
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<script>
    function login() {
        $.easyAjax({
            url: "{!! route('admin.login_check') !!}",
            type: "POST",
            data: $(".login-form").serialize(),
            container: ".login-form",
            messagePosition: "inline"
        });
    }
</script>
</body>
</html>
