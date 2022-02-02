<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="assets/img/apple-icon.png"
        />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <link rel="icon" type="image/png" href="assets/img/favicon.png" />
        <title>Kelontong | {{ $title }}</title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
        <!-- Nucleo Icons -->
        <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.0" rel="stylesheet"/>
    </head>

    <body class="g-sidenav-show bg-gray-100">
        <div class="min-height-300 bg-primary position-absolute w-100"></div>

        <!-- Sidenav -->
        <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
            <div class="sidenav-header">
                <a class="navbar-brand text-center" href="/">
                    <img src="assets/img/snack-booth.png" class="navbar-brand-img h-100" alt="main_logo"/>
                    <span class="ms-1 font-weight-bold">Kelontong.ID</span>
                </a>
            </div>
            <hr class="horizontal dark mt-0" />
            <div
                class="collapse navbar-collapse w-auto"
                id="sidenav-collapse-main"
            >
            
            <!-- Sidenav Content-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
                            >
                                <i
                                    class="ni ni-tv-2 text-primary text-sm opacity-10"
                                ></i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tambah-produk') ? 'active' : '' }}" href="pages/dashboard.html">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
                            >
                                <img src="assets/img/plus.svg" alt="">
                            </div>
                            <span class="nav-link-text ms-1">Tambah Produk</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/dashboard.html">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
                            >
                                <img src="assets/img/log-out.svg" alt="">
                            </div>
                            <form action="/logout" method="post"> @csrf <button type="submit" style="border: none; background-color:transparent"><span class="nav-link-text ms-1">Logout</span></button></form>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="main-content position-relative border-radius-lg">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm">
                                <a style="opacity:0" class="opacity-5 text-white" href="javascript:;"></a>
                            </li>
                            <li style="opacity:0" class="breadcrumb-item text-sm text-white active" aria-current="page">
                                Dashboard
                            </li>
                        </ol>
                        <h6 class="font-weight-bolder text-white mb-0" style="font-size: 23px">
                            Welcome to Dashboard, {{ auth()->user()->name }}
                        </h6>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        </div>
                        <ul class="navbar-nav justify-content-end">
                            <li class="nav-item d-flex align-items-center">
                                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                        <div style="transform:scale(1.4)">
                                            <div class="sidenav-toggler-inner">
                                                <i class="sidenav-toggler-line bg-white"></i>
                                                <i class="sidenav-toggler-line bg-white"></i>
                                                <i class="sidenav-toggler-line bg-white"></i>
                                            </div>
                                        </div sty>
                                    </a>
                                </li>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <!-- Content -->
            <div class="container-fluid py-4">
                <div class="row d-flex justify-content-evenly">

                    <!-- Info 1 -->
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Produk</p>
                                <h5 class="font-weight-bolder">
                                "jumlah produk"
                                </h5>
                            </div>
                            </div>
                            <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle d-flex align-items-center justify-content-center">
                                <img src="assets/img/box.svg" alt="">
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                    <!-- Info 2 -->
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Quantity</p>
                                <h5 class="font-weight-bolder">
                            total quantity
                                </h5>
                            </div>
                            </div>
                            <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle d-flex align-items-center justify-content-center">
                                <img src="assets/img/layers.svg" alt="">
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                    <!-- Info 3 -->
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Jenis Produk</p>
                                <h5 class="font-weight-bolder">
                                jenis produk
                                </h5>
                                <p class="mb-0">
                            </div>
                            </div>
                            <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle d-flex align-items-center justify-content-center">
                                <img src="assets/img/filter.svg" alt="">
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>

                @yield('content')
            </div>
        </main>
        <!--   Core JS Files   -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
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
    </body>
</html>
