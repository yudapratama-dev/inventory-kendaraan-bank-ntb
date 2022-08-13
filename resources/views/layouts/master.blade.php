<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Transport Inventaris Bank NTB</title>

    {{--  responsivemobile  --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css ')}}">

    {{--  Font Awesome  --}}
    <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css')}} ">
    <!-- Ionicons -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}">

    {{-- SweetAlert2 --}}
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">


    {{--  ThemeSytle  --}}
    <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/skin-green.min.css')}} ">

@yield('top')
    {{--  googleapifont  --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    {{--  Header-Section  --}}
    <header class="main-header">
        <a href="/" class="logo">
            {{--  LOGO X 50  --}}
            <span class="logo-mini"><img src="{{asset('assets/img/apple-icon.png')}}" width="100%" alt="Bank NTB Logo"></span>
            {{--  LOGO MOBILE  --}}
            <span class="logo-lg text-center"><img src="{{asset('assets/img/logo-bank-ntb-white.png')}}" width="60%" alt="Bank NTB Logo"></span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
            {{--  ToggleBUTTON  --}}
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            {{--  NAVBAR MENU KANAN  --}}
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    {{--  //MEMANGGIL CLASSDROPDOWN  --}}
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{ asset('user.png') }}" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ \Auth::user()->name  }}</span>
                        </a>

                        {{--  DROPDOWNMENU USER  --}}
                        <ul class="dropdown-menu">
                            {{--  USERIMAGE  --}}
                            <li class="user-header">
                                <img src="{{ asset('user.png') }} " class="img-circle" alt="User Image">
                                <p>
                                    {{ \Auth::user()->name  }}
                                    <small>{{ \Auth::user()->email  }}</small>
                                </p>
                            </li>

                            {{--  ISI DROPDOWN DIBAWAH NAMA  --}}
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>

                                <div class="pull-right">
                                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li> 
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

@include('layouts.sidebar')

    <div class="content-wrapper">
        <section class="content container-fluid">

            @yield('content')

        </section>
    </div>

    {{--  FOOTHER  --}}
    <footer class="main-footer">
        {{--  KANAN  --}}
        <div class="pull-right hidden-xs">
            PT. BANK NTB SYARIAH | DIVISI UMUM
        </div>

        {{--  KIRI  --}}
        <?php $date = date('Y')?>
        <strong>Copyright &copy; {{$date}} <a href="https://www.bankntbsyariah.co.id/">PT. Bank NTB Syariah</strong> All rights reserved.
    </footer>
    
    <div class="control-sidebar-bg"></div>
</div>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{  asset('assets/bower_components/jquery/dist/jquery.min.js') }} "></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{  asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }} "></script>
<!-- AdminLTE App -->
<script src="{{  asset('assets/dist/js/adminlte.min.js') }}"></script>

@yield('bot')
</body>
</html>
