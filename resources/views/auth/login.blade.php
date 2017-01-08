<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('PageTitle')</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ url('css/blue.css')}}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/skin-blue.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/icheck-blue.css') }}">
    <link rel="stylesheet" href="{{ url('css/app.css')}}">
    <script src="{{ url('js/jquery.min.js') }}"></script>
@yield('stylesheets')
@show
<!--[if lt IE 9]
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>OS System</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Entre para iniciar sua sessão</p>

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                <div class="col-md-12">
                    <input id="usr_email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                           placeholder="E-mail" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <input id="password"
                           type="password"
                           class="form-control"
                           name="password"
                           placeholder="Senha"
                           required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 text-center">
                    <button type="submit" class="btn btn-primary btn-flat col-md-6">
                        Login
                    </button>
                </div>
                <div class="col-md-6 text-center">
                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                        Esqueceu sua senha ?
                    </a>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 text-center">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Lembrar de mim
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>


<!-- /.login-box -->
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/jquery.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ url('js/icheck.min.js') }}"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
