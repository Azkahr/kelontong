<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        @notifyCss
        {{-- trix --}}
        <link rel="stylesheet" type="text/css" href="/assets/css/trix.css">
        <script type="text/javascript" src="/assets/js/trix.js"></script>
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        @livewireStyles
        <link rel="icon" type="image/png" href="{{ URL::asset('assets/img/favicon.png') }} " />
        <link href="{{ URL::asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link id="pagestyle" href="{{ URL::asset('assets/css/argon-dashboard.css') }}" rel="stylesheet"/>
        <title>Kelontong | {{ $title }}</title>
        <style>
            trix-toolbar [data-trix-button-group="file-tools"] {
                display: none;
            }
        </style>
    </head>
    <body class="g-sidenav-show bg-gray-100">
        @include('notify::components.notify')
        @yield('color')
        <!-- Sidenav -->
        <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
            <div class="sidenav-header">
                <a class="navbar-brand text-center" href="/">
                    <img src="{{ URL::asset('assets/img/snack-booth.svg') }}" class="navbar-brand-img h-100 d-inline" alt="main_logo"/>
                    <span class="ms-1 font-weight-bold">Kelontong.ID</span>
                </a>
            </div>
            <hr class="horizontal dark mt-0"/>
            <div
                class="collapse navbar-collapse w-auto"
                id="sidenav-collapse-main">
            
            <!-- Sidenav Content-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-chart-line text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1" style="font-family:'Open Sans', sans-serif; font-size:14px; font-weight:600">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile/update/{{ auth()->user()->id }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <img src="{{ URL::asset('assets/img/user.png') }}" alt="user" style="transform: scale(1.3)">
                            </div>
                            <span class="nav-link-text ms-1" style="font-family:'Open Sans', sans-serif; font-size:14px; font-weight:600">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('createP') ? 'active' : '' }}" href="{{ route('createP') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <img src="{{ URL::asset('assets/img/plus.svg') }}" style="transform: scale(1.7)">
                            </div>
                            <span class="nav-link-text ms-1" style="font-family:'Open Sans', sans-serif; font-size:14px; font-weight:600">Tambah Produk</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('orders') ? 'active' : '' }}" href="{{ route('orders') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <img src="{{ URL::asset('assets/img/clipboard.png') }}" style="transform: scale(1.7)">
                            </div>
                            <span class="nav-link-text ms-1" style="font-family:'Open Sans', sans-serif; font-size:14px; font-weight:600">Orders</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="logout">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <img src="{{ URL::asset('assets/img/log-out.svg') }}" style="transform: scale(1.3)">
                            </div>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" style="margin:0; padding:2px; border: none; background-color:transparent">
                                    <span style="font-family:'Open Sans', sans-serif; font-size:14px; font-weight:600; color:#707C95" class="nav-link-text ms-1" >
                                        Logout
                                    </span>
                                </button>
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="main-content position-relative border-radius-lg">
            <div class="container-fluid py-4">
                @yield('content')
            </div>
        </main>
        <!--   Core JS Files   -->
        @notifyJs
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{ URL::asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="assets/js/argon-dashboard.min.js?v=2.0.0"></script>
        <script>
            feather.replace()
        </script>
        @yield('script')
        @livewireScripts 
    </body>
</html>
