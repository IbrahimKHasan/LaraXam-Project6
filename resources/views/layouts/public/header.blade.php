<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>@yield('title')</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('web/assets/images/favicon.png')}}" type="image/png">

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{asset('web/assets/css/magnific-popup.css')}}">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{asset('web/assets/css/slick.css')}}">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{asset('web/assets/css/LineIcons.css')}}">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{asset('web/assets/css/bootstrap.min.css')}}">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{asset('web/assets/css/default.css')}}">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{asset('web/assets/css/style.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    @yield('time')
</head>

<body @yield('body')>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== NAVBAR TWO PART START ======-->

    <section class="navbar-area" style="background-color:white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">

                        <a class="navbar-brand" href="{{route('laraxam.index')}}">
                            <img  id="logo-img" src="{{asset('web/assets/images/logo-2.svg')}}" alt="Logo">
                        </a>
                        <h3 class="nav-item"><a id="logo-name" style="color:#0067f4"  class="page-scroll" href="{{route('laraxam.index')}}">LaraXam</a></h3>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                            <ul class="navbar-nav m-auto" style="color:#0067f4">
                                <li class="nav-item active"><a style="color:#0067f4" class="page-scroll" href="{{route('laraxam.index')}}">home</a></li>
                                <li class="nav-item"><a  style="color:#0067f4" class="page-scroll" href="#about">About</a></li>
                                <li class="nav-item"><a style="color:#0067f4" class="page-scroll" href="#contact">Contact</a></li>
                            </ul>
                        </div>
                        @if (Auth::user() == null)
                        <div class="navbar-btn d-none d-sm-inline-block sub-menu-bar" id="navbarTwo">
                            <ul class="navbar-nav m-auto">
                                <li><a style="color:#0067f4" href="/login">Login</a></li>
                                <li ><a style="color:#0067f4"  href="/register">Signup</a></li>
                            </ul>
                        </div>
                        @endif
                        @if (Auth::user() !== null)
                        <div class="navbar-btn d-none d-sm-inline-block" style="transform: scale(0.8)">
                            <ul>
                                <a class="d-inline solid " href="{{route('profile.index')}}"><img class="rounded-circle" width="50px" height="50px" src="{{asset('img/'.Auth::user()->image)}}" alt="Maxwell Admin"></a>
                            <li class="d-inline mr-3"><a style="color:#0067f4;border:none" href="{{route('profile.index')}}">{{strtok(Auth::user()->name, " ")}}</a></li>
                            <li class="d-inline ml-3"><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button  style="border:none;background-color:white" href=""><a  style="color:#0067f4" type="submit">Logout</a></button>
                            </form></li>
                        </ul>
                        </div>
                        @endif
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== NAVBAR TWO PART ENDS ======-->
