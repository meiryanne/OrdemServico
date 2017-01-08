<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('PageTitle')</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="csrf-token" content={{ csrf_token() }}>
<link rel="stylesheet" href="{{ url('css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ url('css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{ url('css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ url('css/AdminLTE.min.css') }}">
<link rel="stylesheet" href="{{ url('css/skin-blue.min.css') }}">
<link rel="stylesheet" href="{{ url('css/app.css')}}">
<link rel="stylesheet" href="{{ url('css/map-icons.min.css')}}">
<script src="{{ url('js/jquery.min.js') }}"></script>
@yield('stylesheets')
@show
<!--[if lt IE 9]
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
