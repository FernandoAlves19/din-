<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'iDin!') }}</title>

    {{-- Estilos do MAZER --}}
    <link rel="stylesheet" crossorigin href="{{ url('/') }}/assets/compiled/css/app.css">
    <link rel="stylesheet" crossorigin href="{{ url('/') }}/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" crossorigin href="{{ url('/') }}/assets/compiled/css/iconly.css">
    <link rel="shortcut icon" href="{{ url('/') }}/assets/static/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('/') }}/assets/static/images/logo/favicon.png" type="image/png">
    {{-- FIM --}}

    <!-- Scripts -->
    <script src="{{ url('/') }}/js/app.js"></script>

    <!-- JQuery Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
</head>


<body>
    <script src="{{ url('/') }}/assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header>
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            {{-- <a href="{{ url('/') }}"><img style="width: 60%; height: 60%"
                                    src="{{ url('/') }}/assets/static/images/logo/logo.png" alt="Logo"></a> --}}
                        </div>
                        <div class="header-top-right">

                            <div class="dropdown">
                                <a href="#" id="topbarUserDropdown"
                                    class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-md2">
                                        <img src="./assets/compiled/jpg/1.jpg" alt="Avatar">
                                    </div>

                                    <div class="text">
                                        <h6 class="user-dropdown-name">{{ Auth::user()->name }}</h6>
                                        <p class="user-dropdown-status text-sm text-muted">Membro</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem;">
                                    <li>
                                        @php
                                            $nome = explode(' ', Auth::user()->name);
                                        @endphp
                                        <h6 class="dropdown-header">Olá, {{ $nome[0] }}!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('profile') }}"><i
                                                class="icon-mid bi bi-person me-2"></i> Meu perfil</a></li>
                                    <li>
                                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2 dropdown-item">
                                            <a>Tema</a>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                role="img" class="iconify iconify--system-uicons" width="20"
                                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="-2 0 21 21">
                                                <g fill="none" fill-rule="evenodd" stroke="currentColor"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path
                                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                                        opacity=".3"></path>
                                                    <g transform="translate(-210 -1)">
                                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                                        <path
                                                            d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                                        </path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <div class="form-check form-switch fs-6">
                                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                                    style="cursor: pointer">
                                                <label class="form-check-label"></label>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                role="img" class="iconify iconify--mdi" width="20"
                                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="2 0 24 24">
                                                <path fill="currentColor"
                                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </li>
                                    {{-- <li><a class="dropdown-item" href="#"><i
                                            class="icon-mid bi bi-wallet me-2"></i>
                                        Wallet</a></li> --}}
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item">

                                            <form method="post" action="{{ route('logout') }}">
                                                {{ csrf_field() }}
                                                <button class="btn-link nav-link" type="submit" style="border:none">
                                                    <i class="icon-mid bi bi-box-arrow-left me-2"></i> Sair
                                                </button>
                                            </form>

                                        </a></li>
                                </ul>
                            </div>

                            <!-- Burger button responsive -->
                            {{-- <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a> --}}
                        </div>
                    </div>
                </div>
                {{-- <nav class="main-navbar">
                    <div class="container">
                        <ul>



                            <li
                                class="menu-item  ">
                                <a href="index.html" class='menu-link'>
                                    <span><i class="bi bi-grid-fill"></i> Dashboard</span>
                                </a>
                            </li>



                        </ul>
                    </div>
                </nav> --}}

            </header>

            <div class="content-wrapper container">
                {{--
                <div class="page-heading">
                    <h3>Horizontal Layout</h3>
                </div> --}}
                <div class="page-content">
                    {{-- <section class="row"> --}}
                        <!-- INICIO DO CONTEUDO -->
                        <div id="card" style="height: auto !important;" class="card">
                            {{-- <div class="card-header">
                                <h4 class="card-title">@yield('title')</h4>
                            </div> --}}
                            <div style="padding-top: 1% !important;" class="card-body p-0">

                                @yield('content')

                            </div>
                        </div>

                    {{-- </section> --}}
                </div>


            </div>

            {{-- <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2023 &copy; iDin!</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                    href="#">@Nando_Allves</a></p>
                        </div>
                    </div>
                </div>
            </footer> --}}
        </div>
    </div>
    <script src="{{ url('/') }}/assets/static/js/components/dark.js"></script>
    <script src="{{ url('/') }}/assets/static/js/pages/horizontal-layout.js"></script>
    <script src="{{ url('/') }}/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="{{ url('/') }}/assets/compiled/js/app.js"></script>


    <script src="{{ url('/') }}/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="{{ url('/') }}/assets/static/js/pages/dashboard.js"></script>

    {{-- <script>
        document.body.style.overflow = "hidden";
    </script> --}}
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('.money').mask("#0,00", {
                reverse: true
            });
        });
    </script>

</body>

</html>



{{-- <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand text-primary" href="{{ route('home') }}">
                    {{ config('app.name', 'iDin!') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('app.Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('app.Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <form action="{{ route('dark.mode') }}" method="PUT">
                                    @csrf
                                    @method('PUT')
                                    <select name="theme">
                                       <option value="darkly">Dark</option>
                                       <option value="cerulean">Light</option>
                                    </select>
                                    <button type="submit">ok</button>
                                 </form>

                                <a class="dropdown-item" href="{{ route('profile') }}">Meu perfil</a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('app.Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


</body> --}}
