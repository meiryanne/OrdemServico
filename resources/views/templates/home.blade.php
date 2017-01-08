<!DOCTYPE html>
<html>
<head>
    @include('templates.includes.header')
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
            <span class="logo-mini"><b>R</b></span>
            <span class="logo-lg"> Rastrear</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <!-- Auth Links -->
            <ul class="nav navbar-nav navbar-right" style="margin-right: 15px;">
                @if (Auth::guest())

                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('user.profile', ['id' => Auth::user()->id]) }}">
                                    Dashboard
                                </a>
                                <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                    {{ csrf_field() }}
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>

            <!-- Mensagens -->
            <div class="navbar-custom-menu navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-success">@yield('HowManyMessages')</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">@yield('Messages')</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the sidebar -->
@include('templates.includes.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                @yield('Title')
                <small>@yield('Subtitle')</small>
                {!! Toastr::render() !!}
                <div class="form-inline inline pull-right" style="margin-left: 5px;">
                </div>
            </h1>
        </section>
        <section class="content">
            @yield('Content')
        </section>
    </div>
</div>
<!-- /.content-wrapper -->
@include('templates.includes.footer')
<div class="control-sidebar-bg"></div>
<!-- ./wrapper -->
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/Chart.min.js') }}"></script>
<script src="{{ url('js/tooltip.js') }}"></script>
<script src="{{ url('js/fastclick.min.js')}}"></script>
<script src="{{ url('js/admin-lte.min.js') }}"></script>
<script src="{{ url('js/jquery.sparkline.min.js') }}"></script>
<script src="{{ url('js/base.js') }}"></script>
@yield('Scripts')
</body>
</html>